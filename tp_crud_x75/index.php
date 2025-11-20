<?php
// index.php
require_once 'db_connect.php';

// Config
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
mysqli_set_charset($conn, 'utf8mb4');

// Estado inicial
$edit_mode = false;
$user_data = [
    'id'        => '',
    'firstname' => '',
    'lastname'  => '',
    'email'     => '',
    'gender'    => '',
    'birthdate' => '',
    'age'       => ''
];

// Modo edición (si viene ?edit=ID)
if (isset($_GET['edit'])) {
    $edit_mode = true;
    $user_id = (int) $_GET['edit'];

    $stmt = mysqli_prepare($conn, "SELECT id, firstname, lastname, email, gender, birthdate, age FROM users WHERE id = ?");
    mysqli_stmt_bind_param($stmt, 'i', $user_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($result && mysqli_num_rows($result) > 0) {
        $user_data = mysqli_fetch_assoc($result);
    } else {
        // Si el ID no existe, salir de edición
        $edit_mode = false;
    }
    mysqli_free_result($result);
    mysqli_stmt_close($stmt);
}

// Traer usuarios para la tabla
$users = mysqli_query($conn, "SELECT id, firstname, lastname, email, gender, birthdate, age, created_at FROM users ORDER BY created_at DESC");
?>
    <!DOCTYPE html>
    <html lang="fr">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <title>Gestion des Utilisateurs</title>
        <link rel="stylesheet" href="style.css">
        <script src="script.js" defer></script>
    </head>
    <body>
    <div class="container">
        <header>
            <h1>Gestion des Utilisateurs</h1>
        </header>

        <?php if (isset($_GET['success'])): ?>
            <div class="alert alert-success">
                <?php
                switch ($_GET['success']) {
                    case 'added':
                        echo 'Utilisateur ajouté avec succès !';
                        break;
                    case 'updated':
                        echo 'Utilisateur modifié avec succès !';
                        break;
                    case 'deleted':
                        echo 'Utilisateur supprimé avec succès !';
                        break;
                    default:
                        echo 'Action effectuée avec succès.';
                        break;
                }
                ?>
            </div>
        <?php endif; ?>

        <?php if (isset($_GET['error'])): ?>
            <div class="alert alert-error">
                Une erreur s&#39;est produite : <?php echo htmlspecialchars($_GET['error']); ?>
            </div>
        <?php endif; ?>

        <div class="form-container">
            <h2><?php echo $edit_mode ? 'Modifier un utilisateur' : 'Ajouter un utilisateur'; ?></h2>

            <form id="userForm"
                  action="<?php echo $edit_mode ? 'update_user.php' : 'add_user.php'; ?>"
                  method="POST" novalidate>

                <?php if ($edit_mode): ?>
                    <input type="hidden" name="id" value="<?php echo htmlspecialchars($user_data['id']); ?>">
                <?php endif; ?>

                <div class="form-row">
                    <div class="form-group">
                        <label for="firstname">Prénom <span class="required">*</span></label>
                        <input type="text" id="firstname" name="firstname"
                               value="<?php echo htmlspecialchars($user_data['firstname']); ?>"
                               placeholder="Entrez le prénom">
                        <span class="error-message" id="error-firstname"></span>
                    </div>

                    <div class="form-group">
                        <label for="lastname">Nom <span class="required">*</span></label>
                        <input type="text" id="lastname" name="lastname"
                               value="<?php echo htmlspecialchars($user_data['lastname']); ?>"
                               placeholder="Entrez le nom">
                        <span class="error-message" id="error-lastname"></span>
                    </div>
                </div>

                <div class="form-group">
                    <label for="email">Email <span class="required">*</span></label>
                    <input type="email" id="email" name="email"
                           value="<?php echo htmlspecialchars($user_data['email']); ?>"
                           placeholder="exemple@email.com">
                    <span class="error-message" id="error-email"></span>
                </div>

                <!-- IMPORTANTE: id="gender" para que el JS pueda marcar el grupo -->
                <div class="form-group" id="gender">
                    <label>Sexe <span class="required">*</span></label>
                    <div class="radio-group">
                        <label class="radio-label">
                            <input type="radio" name="gender" value="Homme"
                                <?php echo ($user_data['gender'] === 'Homme') ? 'checked' : ''; ?>>
                            <span>Homme</span>
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="gender" value="Femme"
                                <?php echo ($user_data['gender'] === 'Femme') ? 'checked' : ''; ?>>
                            <span>Femme</span>
                        </label>
                    </div>
                    <span class="error-message" id="error-gender"></span>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="birthdate">Date de naissance <span class="required">*</span></label>
                        <input type="date" id="birthdate" name="birthdate"
                               value="<?php echo htmlspecialchars($user_data['birthdate']); ?>">
                        <span class="error-message" id="error-birthdate"></span>
                    </div>

                    <div class="form-group">
                        <label for="age">Âge <span class="required">*</span></label>
                        <input type="number" id="age" name="age"
                               value="<?php echo htmlspecialchars($user_data['age']); ?>"
                               min="10" max="99" placeholder="10-99">
                        <span class="error-message" id="error-age"></span>
                    </div>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">
                        <?php echo $edit_mode ? 'Mettre à jour' : 'Ajouter'; ?>
                    </button>
                    <?php if ($edit_mode): ?>
                        <a href="index.php" class="btn btn-secondary">Annuler</a>
                    <?php endif; ?>
                </div>
            </form>
        </div>

        <div class="users-container">
            <h2>Liste des utilisateurs</h2>

            <?php if ($users && mysqli_num_rows($users) > 0): ?>
                <div class="table-responsive">
                    <table class="users-table">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Prénom</th>
                            <th>Nom</th>
                            <th>Email</th>
                            <th>Sexe</th>
                            <th>Date de naissance</th>
                            <th>Âge</th>
                            <th>Date d&#39;ajout</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php while ($user = mysqli_fetch_assoc($users)): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($user['id']); ?></td>
                                <td><?php echo htmlspecialchars($user['firstname']); ?></td>
                                <td><?php echo htmlspecialchars($user['lastname']); ?></td>
                                <td><?php echo htmlspecialchars($user['email']); ?></td>
                                <td><?php echo htmlspecialchars($user['gender']); ?></td>
                                <td><?php echo htmlspecialchars(date('d/m/Y', strtotime($user['birthdate']))); ?></td>
                                <td><?php echo htmlspecialchars($user['age']); ?> ans</td>
                                <td><?php echo htmlspecialchars(date('d/m/Y H:i', strtotime($user['created_at']))); ?></td>
                                <td class="actions">
                                    <a href="index.php?edit=<?php echo (int)$user['id']; ?>"
                                       class="btn-action btn-edit" title="Modifier">Modifier</a>

                                    <button
                                            onclick="deleteUser(<?php echo (int)$user['id']; ?>, '<?php echo htmlspecialchars($user['firstname'].' '.$user['lastname']); ?>')"
                                            class="btn-action btn-delete" title="Supprimer">
                                        Supprimer
                                    </button>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            <?php else: ?>
                <div class="empty-state">
                    <p>Aucun utilisateur enregistré pour le moment.</p>
                    <p>Utilisez le formulaire ci-dessus pour ajouter votre premier utilisateur.</p>
                </div>
            <?php endif; ?>
        </div>
    </div>

    </body>
    </html>
<?php
// Limpieza
if ($users instanceof mysqli_result) {
    mysqli_free_result($users);
}
mysqli_close($conn);
