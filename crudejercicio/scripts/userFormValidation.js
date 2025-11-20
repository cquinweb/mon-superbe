document.addEventListener('DOMContentLoaded', () => {
    const f = document.getElementById('userForm');
    if (!f) return;

    f.addEventListener('submit', (e) => {
        const data = new FormData(f);
        const errors = [];

        const email = (data.get('email') || '').trim();
        const age = parseInt(data.get('age') || '0', 10);
        const birth = data.get('birthdate');

        const emailOk = /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
        if (!emailOk) errors.push('Email inválido');

        if (isNaN(age) || age < 10 || age > 99) errors.push('Edad entre 10 y 99');

        const today = new Date(); today.setHours(0,0,0,0);
        const bd = birth ? new Date(birth) : null;
        if (!bd || bd >= today) errors.push('Fecha de nacimiento anterior a hoy');

        const gender = data.get('gender');
        if (gender !== 'Homme' && gender !== 'Femme') errors.push('Seleccione sexo');

        ['firstname','lastname','email','birthdate','age'].forEach(k=>{
            if(!(data.get(k)||'').toString().trim()) errors.push('Complete todos los campos');
        });

        if (errors.length) {
            e.preventDefault();
            alert('Corrige: \n- ' + [...new Set(errors)].join('\n- '));
        }
    });
});
