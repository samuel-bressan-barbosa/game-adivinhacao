import axios from 'axios';

const appDiv = document.getElementById("app");
const dificuldade = appDiv.dataset.dificuldade;

const imageDiv = document.getElementById("image");
const imageId = imageDiv.dataset.image;

let tentativas = 0;
let codigo = "";

document.getElementById("guess-button").addEventListener("click", function () {
    let valor = document.getElementById("slim-select").value;
    if (codigo === valor) {
        alert("Resposta Correta");
        location.reload();
    } else if (tentativas < 5) {
        document.querySelector(".vidas span:not(.perdida)")
            .classList.add("perdida");

        tentativas++;
        getImage();
    } else {
        alert("Você perdeu! Não prestou atenção né :(");
        location.reload();
    }
})

getImage();

export function getImage() {
    axios.get("/classic/image", {
        params: {
            dificuldade: dificuldade,
            tentativas: tentativas,
            tecnologia: imageId
        }
    }).then(res => {
        const img = document.getElementById("guess-image");
        img.src = res.data.image;

        codigo = res.data.codigo;
    });
}