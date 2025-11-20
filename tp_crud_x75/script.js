// script.js

function showError(fieldId, message) {
    const errorElement = document.getElementById(`error-${fieldId}`);
    if (errorElement) {
        errorElement.textContent = message;
        errorElement.style.display = 'block';
    }

    if (fieldId === 'gender') {
        const group = document.getElementById('gender');
        if (group) group.classList.add('input-error');
    } else {
        const inputElement = document.getElementById(fieldId);
        if (inputElement) inputElement.classList.add('input-error');
    }
}

function clearError(fieldId) {
    const errorElement = document.getElementById(`error-${fieldId}`);
    if (errorElement) {
        errorElement.textContent = '';
        errorElement.style.display = 'none';
    }

    if (fieldId === 'gender') {
        const group = document.getElementById('gender');
        if (group) group.classList.remove('input-error');
    } else {
        const inputElement = document.getElementById(fieldId);
        if (inputElement) inputElement.classList.remove('input-error');
    }
}

function clearAllErrors() {
    ['firstname','lastname','email','gender','birthdate','age'].forEach(clearError);
}

function validateFirstname() {
    const v = document.getElementById('firstname').value.trim();
    if (!v) return showError('firstname','Le prénom est obligatoire.'), false;
    if (v.length < 2) return showError('firstname','Le prénom doit contenir au moins 2 caractères.'), false;
    if (v.length > 50) return showError('firstname','Le prénom ne peut pas dépasser 50 caractères.'), false;
    clearError('firstname'); return true;
}

function validateLastname() {
    const v = document.getElementById('lastname').value.trim();
    if (!v) return showError('lastname','Le nom est obligatoire.'), false;
    if (v.length < 2) return showError('lastname','Le nom doit contenir au moins 2 caractères.'), false;
    if (v.length > 50) return showError('lastname','Le nom ne peut pas dépasser 50 caractères.'), false;
    clearError('lastname'); return true;
}

function validateEmail() {
    const v = document.getElementById('email').value.trim();
    const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!v) return showError('email',"L'email est obligatoire."), false;
    if (!re.test(v)) return showError('email',"Le format de l'email est invalide."), false;
    clearError('email'); return true;
}

function validateGender() {
    const radios = Array.from(document.getElementsByName('gender'));
    const checked = radios.some(r => r.checked);
    if (!checked) return showError('gender','Le sexe est obligatoire.'), false;
    clearError('gender'); return true;
}

function validateBirthdate() {
    const v = document.getElementById('birthdate').value;
    if (!v) return showError('birthdate','La date de naissance est obligatoire.'), false;
    const d = new Date(v);
    const today = new Date();
    today.setHours(0, 0, 0, 0);
    if (Number.isNaN(d.getTime())) return showError('birthdate','Le format de la date est invalide.'), false;
    if (d >= today) return showError('birthdate',"La date de naissance doit être antérieure à aujourd'hui."), false;
    clearError('birthdate'); return true;
}

function validateAge() {
    const v = document.getElementById('age').value;
    if (v === '') return showError('age',"L'âge est obligatoire."), false;
    const n = parseInt(v, 10);
    if (Number.isNaN(n)) return showError('age',"L'âge doit être un nombre."), false;
    if (n < 10 || n > 99) return showError('age',"L'âge doit être compris entre 10 et 99 ans."), false;
    clearError('age'); return true;
}

function validateForm(event) {
    event.preventDefault();
    clearAllErrors();

    const okFirst = validateFirstname();
    const okLast  = validateLastname();
    const okMail  = validateEmail();
    const okSex   = validateGender();
    const okBirth = validateBirthdate();
    const okAge   = validateAge();

    const ok = okFirst && okLast && okMail && okSex && okBirth && okAge;
    if (ok) {
        event.target.submit();
    } else {
        const first =
            document.querySelector('.input-error') ||
            document.querySelector('.error-message[style*="block"]');
        if (first && first.scrollIntoView) {
            first.scrollIntoView({ behavior: 'smooth', block: 'center' });
        }
    }
}

function deleteUser(userId, userName) {
    const confirmation = confirm(
        `Attention!\n\nÊtes-vous sûr de vouloir supprimer l'utilisateur "${userName}" ?\n\nCette action est irréversible.`
    );
    if (confirmation) {
        window.location.href = `delete_user.php?id=${userId}`;
    }
}

document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('userForm');
    if (form) {
        form.addEventListener('submit', validateForm);
        document.getElementById('firstname').addEventListener('blur', validateFirstname);
        document.getElementById('lastname').addEventListener('blur', validateLastname);
        document.getElementById('email').addEventListener('blur', validateEmail);
        Array.from(document.getElementsByName('gender')).forEach(r => r.addEventListener('change', validateGender));
        document.getElementById('birthdate').addEventListener('blur', validateBirthdate);
        document.getElementById('age').addEventListener('blur', validateAge);
    }

    document.querySelectorAll('.alert').forEach(alert => {
        setTimeout(() => {
            alert.style.opacity = '0';
            setTimeout(() => { alert.style.display = 'none'; }, 300);
        }, 5000);
    });
});
