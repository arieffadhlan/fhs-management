<script>
    function preview() {
        let clear_image = document.getElementById('clear_image');
        clear_image.classList.remove("d-none");
        frame.src = URL.createObjectURL(event.target.files[0]);
        frame.alt = document.getElementById('foto_barang').files[0].name;
        frame.style.width = "150px";
    }

    function clearImage() {
        let clear_image = document.getElementById('clear_image');
        let image = document.getElementById('foto_barang');
        clear_image.classList.add("d-none");
        frame.src = "";
        frame.alt = "";
        image.value = "";
    }
</script>
