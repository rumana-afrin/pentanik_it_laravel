document.addEventListener('DOMContentLoaded', function () {
    const tagInput = document.getElementById('tagInput');
    const tagsContainer = document.getElementById('tags');

    tagInput.addEventListener('keydown', function (e) {
        if (e.key === 'Enter') {
            e.preventDefault();
            const tagValue = tagInput.value.trim();
            if (tagValue) {
                addTag(tagValue);
                tagInput.value = '';
            }
        }
    });

    function addTag(value) {
        const span = document.createElement('span');
        span.className = 'tag';
        span.innerHTML = `${value} <span class="remove" style="cursor:pointer;">×</span>`;

        // Hidden input to submit
        const hiddenInput = document.createElement('input');
        hiddenInput.type = 'hidden';
        hiddenInput.name = 'tag[]';
        hiddenInput.value = value;
        span.appendChild(hiddenInput);

        // Add remove function
        span.querySelector('.remove').addEventListener('click', function () {
            span.remove();
        });

        tagsContainer.appendChild(span);
    }
});

//end blog tag


