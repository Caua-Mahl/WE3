function mostrarInfo(div) {
    var selecionado = div.getElementsByClassName("escondido");
    var produtos    = document.getElementsByClassName("produtos");
    var filtro      = document.getElementsByClassName("modalidade");

    if (selecionado[0].style.display == "none") {
        
        for (var i = 0; i < produtos.length; i++) {
            produtos[i].style.display = "none";
        }

        filtro[0].style.display      = "none"; 
        div.style.display            = "block";
        selecionado[0].style.display = "block";
        div.classList.remove("hover");
    }
    else {

        for (var i = 0; i < produtos.length; i++) {
            produtos[i].style.display = "block";
        }

        selecionado[0].style.display = "none";
        filtro[0].style.display      = "block";
        div.classList.add("hover");
    }
}

function adicionar(div) {
    var quantidade          = div.getElementsByClassName("quantidade");
    quantidade[0].innerHTML = parseInt(quantidade[0].innerHTML) + 1;
}

function remover(div) {
    var quantidade          = div.getElementsByClassName("quantidade");
    quantidade[0].innerHTML = parseInt(quantidade[0].innerHTML) - 1 > 1 ? parseInt(quantidade[0].innerHTML) - 1 : 1;
}

function pegarQuantidade(div) {
    div.getElementsByClassName("quantidadeFinal")[0].value = div.getElementsByClassName("quantidade")[0].innerHTML;
}


function modalidade($modalidade) {
    var produtos = document.getElementsByClassName("produtos");

    if ($modalidade == 0) {
        for (var i = 0; i < produtos.length; i++) {
            produtos[i].style.display = "block";
        }
        return;
    }

    for (var i = 0; i < produtos.length; i++) {
        produtos[i].classList.contains($modalidade) ? produtos[i].style.display = "block" : produtos[i].style.display = "none";
    }
}

// não necessário para o funcionamento do codigo //

function shenlong() {
    var shenlong = document.getElementsByClassName("shenlong")[0];

    if (shenlong.style.display == "none") {
        shenlong.style.display = "block";
        document.getElementsByTagName("footer")[0].style.display = "none";
        document.getElementsByTagName("header")[0].style.display = "none";
        document.getElementsByTagName("main")[0].style.display   = "none";
        return;
    } 
    
    shenlong.style.display = "none";
    document.getElementsByTagName("footer")[0].style.display = "flex";
    document.getElementsByTagName("header")[0].style.display = "flex";
    document.getElementsByTagName("main")[0].style.display   = "flex";
}

function esfera() {
    document.getElementsByClassName("esfera")[0].style.display = "block";
    document.getElementsByTagName("main")[0].style.display     = "none";

    setTimeout(
        function() {
          document.getElementsByClassName("esfera")[0].style.display = "none";
          document.getElementsByTagName("main")[0].style.display     = "flex";
        },
        10000
    );
}

function qrcode() {
    var qrcode = document.getElementsByClassName("qrcode")[0];

    if (qrcode.style.display == "none") {
        qrcode.style.display = "block";
        document.getElementsByTagName("main")[0].style.display = "none";
        return;
    } 
    
    qrcode.style.display = "none";
    document.getElementsByTagName("main")[0].style.display = "flex";
}
