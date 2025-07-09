document.getElementById("userInput")
    .addEventListener("keydown", function (event) {

        if (event.key === "Enter") {
            let value = document.getElementById("userInput").value;

            let partes = value.split(" ");

            if (partes.length === 3 && partes[0] === 'play') {
                let finalLink = "";

                if (partes[1] === "-c" || partes[1] === "--classic") {
                    finalLink += "/classic/play";
                }

                if (partes[2] === "-e" || partes[2] === "--easy") {
                    finalLink += "/easy";
                } else if (partes[2] === "-m" || partes[2] === "--medium") {
                    finalLink += "/medium";
                } else {
                    finalLink += "/hard";
                }

                window.location.href = finalLink;
            }

        }
    });