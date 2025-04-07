document.addEventListener('DOMContentLoaded', function() {
    // Añadir clase de animación a los elementos que entran en el viewport
    const animatedElements = document.querySelectorAll('.feature-card, .tech-card, .team-img');
    
    if ('IntersectionObserver' in window) {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('fade-in');
                    observer.unobserve(entry.target);
                }
            });
        }, {
            root: null,
            threshold: 0.1
        });

        animatedElements.forEach(element => {
            observer.observe(element);
        });
    } else {
        // Fallback para navegadores que no soportan IntersectionObserver
        animatedElements.forEach(element => {
            element.classList.add('fade-in');
        });
    }
    
    // Añadir tooltip a los elementos que lo necesiten
    const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl);
    });
});

// Mejora para la tabla de rankings - resaltar la fila al pasar el mouse
const rankingRows = document.querySelectorAll('.ranking-table tbody tr');
if (rankingRows) {
    rankingRows.forEach(row => {
        row.addEventListener('mouseenter', function() {
            this.style.backgroundColor = 'rgba(0, 123, 255, 0.1)';
            this.style.transition = 'background-color 0.3s ease';
        });
        
        row.addEventListener('mouseleave', function() {
            this.style.backgroundColor = '';
        });
    });
}

// Validación simple para formularios
const forms = document.querySelectorAll('.needs-validation');

if (forms) {
    Array.from(forms).forEach(form => {
        form.addEventListener('submit', event => {
            if (!form.checkValidity()) {
                event.preventDefault();
                event.stopPropagation();
            }
            
            form.classList.add('was-validated');
        }, false);
    });
}

// Contador de estadísticas animado para la página principal
function animateCounter(element, target, duration = 2000) {
    if (!element) return;
    
    const start = 0;
    const increment = target / (duration / 16);
    let current = start;
    
    const timer = setInterval(() => {
        current += increment;
        
        if (current >= target) {
            clearInterval(timer);
            current = target;
        }
        
        element.textContent = Math.floor(current).toLocaleString();
    }, 16);
}

// Iniciar contadores cuando estén visibles
const counters = document.querySelectorAll('.counter');
if (counters && 'IntersectionObserver' in window) {
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const target = parseInt(entry.target.getAttribute('data-target'), 10);
                animateCounter(entry.target, target);
                observer.unobserve(entry.target);
            }
        });
    }, {
        root: null,
        threshold: 0.1
    });
    
    counters.forEach(counter => {
        observer.observe(counter);
    });
}