<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bodmas Education</title>
    <style>
        #popupOverlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 999;
        }

        #popupImageContainer {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: white;
            padding: 10px;
            border-radius: 8px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            z-index: 1000;
            max-width: 90%;
            max-height: 90%;
        }

        #popupImage {
            max-width: 100%;
            max-height: 100%;
            display: block;
            border-radius: 8px;
        }

        #closePopup {
            position: absolute;
            top: 5px;
            right: 10px;
            background: transparent;
            border: none;
            font-size: 24px;
            font-weight: bold;
            color: #ff0000;
            cursor: pointer;
        }
        @media (max-width: 600px) {
            #popupImageContainer {
                width: 90%;
                padding: 5px;
            }

            #popupImage {
                max-width: 100%;
            }
        }
    </style>
</head>

<body>
    <div id="popupOverlay"></div>
    <div id="popupImageContainer">
        <button id="closePopup" aria-label="Close">&times;</button>
        <a href="{{route('contact')}}" target="_blank">
        <img id="popupImage" src="{{asset('assets/img/hero/neet-ug-2025.jpeg')}}" alt="Popup Image">
        </a>
    </div>

    <script>
        setTimeout(() => {
            document.getElementById('popupOverlay').style.display = 'block';
            document.getElementById('popupImageContainer').style.display = 'block';
        }, 4000);

        document.getElementById('popupOverlay').addEventListener('click', () => {
            document.getElementById('popupOverlay').style.display = 'none';
            document.getElementById('popupImageContainer').style.display = 'none';
        });

        document.getElementById('closePopup').addEventListener('click', () => {
            document.getElementById('popupOverlay').style.display = 'none';
            document.getElementById('popupImageContainer').style.display = 'none';
        });
    </script>
</body>

</html>
