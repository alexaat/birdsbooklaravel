<script type="text/javascript">
            document.querySelector('#input-file').addEventListener('change', (e) => {
                const file = e.target.files[0];
                const fileReader = new FileReader();
                fileReader.readAsDataURL(file); 
                fileReader.onload = function (){
                    const fileInputContainer = document.querySelector('.uploaded-file');
                    fileInputContainer.setAttribute('style',                `
                    background-image: url('${fileReader.result}');
                    background-size: contain;
                    `);
                }
            });
</script>