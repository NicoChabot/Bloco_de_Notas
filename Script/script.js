document.addEventListener('DOMContentLoaded', function() {
    // Confirm deletion
    const deleteLinks = document.querySelectorAll('.delete');
    deleteLinks.forEach(function(link) {
        link.addEventListener('click', function(e) {
            if (!confirm('Tem certeza de que deseja excluir esta nota?')) {
                e.preventDefault();
            }
        });
    });
});