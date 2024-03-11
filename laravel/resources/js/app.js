import './bootstrap';

<script>
    function mostrarInfo(div) {
        var infos = div.getElementsByClassName("escondido");
        for (var i = 0; i < infos.length; i++) {
            if (infos[i].style.display === "none") {
                infos[i].style.display = "block";
            } else {
                infos[i].style.display = "none";
            }
        }
    }
</script>