
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stylizacja paznokci</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
<aside>
    <img src="manicure.jpg" alt="Stylizacja paznokci">
</aside>

<main>
    <header>
        <h1>Twoje wymarzone paznokcie</h1>
    </header>

    <nav>
        <button onmouseover="kolor()" id="btn_s1">Kolor</button>
        <button onmouseenter="ksztalt()" id="btn_s2">Kształt</button>
        <button onmouseenter="wzor()" id="btn_s3">Wzór</button>
    </nav>

    <div id="sekcja1">
        <h2>Kolor</h2>
        <img src="kolory.png" alt="Kolory paznokci"><br>
        <input type="color" name="kolor" id="kolor" value="#FF0000">
    </div>

    <div id="sekcja2">
        <h2>Kształt</h2>
        <img src="ksztalt.png" alt="Kształty paznokci"><br>
        <select name="ksztalt" id="ksztalt">
            <option value="migdal">Migdał</option>
            <option value="zaokraglony">Zaokrąglony</option>
            <option value="kwadratowy">Kwadratowy</option>
            <option value="balerina">Balerina</option>
            <option value="zaokraglony_kwadrat">Zaokrąglony kwadrat</option>
        </select>
    </div>

    <div id="sekcja3">
        <h2>Wzór</h2>
        <script>
            // Skrypt #1
            for (let i = 1; i <= 10; i++) {
                const img = document.createElement('img');
                img.src = i + '.jpg';
                img.className = 'wzory';
                img.title = i;
                document.currentScript.parentElement.appendChild(img);
            }
        </script>
        <br>
        <input type="number" name="wzor" id="wzor" min="1" max="10" step="1">
    </div>
</main>

<footer>
    <p>Autor strony: <a href="https://ee-informatyk.pl/" target="_blank" style="text-decoration: none;color: unset;"><em>EE-Informatyk.pl</em></a></p>
</footer>

<script>
    function kolor(){
        document.getElementById('sekcja1').style.display="block"
        document.getElementById('sekcja2').style.display="none"
        document.getElementById('sekcja3').style.display="none"
        document.getElementById('btn_s1').style.backgroundColor="Salmon"
        document.getElementById('btn_s2').style.backgroundColor="Crimson"
        document.getElementById('btn_s3').style.backgroundColor="Crimson"
    }
    function ksztalt(){
        document.getElementById('sekcja1').style.display="none"
        document.getElementById('sekcja2').style.display="block"
        document.getElementById('sekcja3').style.display="none"
        document.getElementById('btn_s1').style.backgroundColor="Crimson"
        document.getElementById('btn_s2').style.backgroundColor="Salmon"
        document.getElementById('btn_s3').style.backgroundColor="Crimson"
    }
    function wzor(){
        document.getElementById('sekcja1').style.display="none"
        document.getElementById('sekcja2').style.display="none"
        document.getElementById('sekcja3').style.display="block"
        document.getElementById('btn_s1').style.backgroundColor="Crimson"
        document.getElementById('btn_s2').style.backgroundColor="Crimson"
        document.getElementById('btn_s3').style.backgroundColor="Salmon"
    }
</script>
</body>
</html>