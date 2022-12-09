import './bootstrap';


$(document).ready(function() {
    $('body').on('change', 'form #tittle[name=tittle]', ()=>
    {
        const tittle = document.querySelector('#tittle');
        const slug = document.querySelector('#slug');
        fetch('/dashboard/posts/createSlug?tittle=' + tittle.value)
            .then((response) => response.json())
            .then((data) => slug.value = data.slug);
    })
    $('.deletePost').on('click', function (e) {
        return confirm('Are You sure?')
    })

    $('#image').on('change', (e)=>{

        const image = document.querySelector('#image');
        const imgPreview = document.querySelector('.imgPreview');

        imgPreview.style.display='block';

        // console.log(image.files[0]);
        console.log(image.files[0]);
        let ofReader = new FileReader();
        ofReader.readAsDataURL(image.files[0]);
        ofReader.onload = function (oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
    })

});
