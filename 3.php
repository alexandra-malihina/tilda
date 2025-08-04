<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Контакты</title>
    <style>
        body {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            width: 100vw;
            height: 100vh;
            background-color: #eee;
            margin: 0;
            padding: 0;
        }

        .wrapper {
            position: absolute;
            height: 100vh;
            width: 100vw;
            background: black;
            opacity: 0.3;
            z-index: 5;
        }

        div {
            max-width: 100%;
        }

        .p-15 {
            padding: 15px;
        }

        .b-black {
            background-color: black;
        }

        .city {
            margin-left: 15px;
            z-index: 100;
            position: relative;
        }

        .digits {
            color: hotpink;
        }

        #main {
            height: 100%;
        }

        #info {
            max-width: max-content;
            padding: 15px 30px;
            background: white;
            border: 2px solid hotpink;
            border-radius: 17px;
            /* display: none; */
            position: absolute;
            z-index: 100;
        }

        #header {
            color: #eee;
            display: flex;
            justify-content: space-between;
            align-items: baseline;
        }

        @media screen and (width <=600px) {
            #header {
                display: flex;
                flex-direction: column;
                gap: 15px;
            }

        }

        @media screen and (width <=350px) {
            .page-info {
                display: flex;
                flex-direction: column;
                gap: 15px;
            }

            .city {
                margin: -10px;
            }

        }


        #footer {
            color: #eee;
            display: flex;
            justify-content: end;
        }

        .phone {
            color: #eee;
            font-weight: bold;
        }

        select {
            appearance: none;

            @supports (appearance: base-select) {

                &,
                &::picker(select) {
                    appearance: base-select;
                }
            }
        }

        select {
            color: #eee;
            background-color: inherit;
            border: none;
            letter-spacing: 3px;
            font-weight: bold;
            outline: none;
            cursor: pointer;
            min-width: 150px;
            align-items: center;
            color: white;
            padding-block: 10px;
            padding-inline: 10px 30px;
            border-radius: 5px;
            /* border: 2px solid plum; */
            cursor: pointer;
            font-weight: 700;

            &:hover {
                color: hotpink;
            }

            @supports (appearance: base-select) {
                padding-inline: 10px;
                background-image: none;

                &::picker-icon {
                    content: "";
                    width: 20px;
                    height: 20px;
                    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke-width='1.5' stroke='%23FFF' class='size-6'%3E%3Cpath stroke-linecap='round' stroke-linejoin='round' d='m19.5 8.25-7.5 7.5-7.5-7.5' /%3E%3C/svg%3E%0A");
                    transition: rotate 0.2s ease-out;
                }

                &:open::picker-icon {
                    rotate: 180deg;
                }

                &::picker(select) {
                    padding: 0;
                    margin-top: 5px;
                    border: 2px solid hotpink;
                    background: white;
                    border-radius: 5px;
                    font-weight: 400;

                    opacity: 0;
                    height: 0;
                    overflow: clip;
                    transition: height 0.5s ease-out, opacity 0.5s ease-out, overlay 0.5s,
                        display 0.5s;

                    transition-behavior: allow-discrete;
                }

                &:open::picker(select) {
                    opacity: 1;
                    height: calc-size(auto, size);
                    overflow: auto;

                    @starting-style {
                        opacity: 0;
                        height: 0;
                    }
                }

                option {
                    padding: 10px;
                    border-top: 1px solid hotpink;
                    cursor: pointer;

                    transition-duration: 0.2s;
                    transition-timing-function: ease-out;

                    &:hover {
                        color: hotpink;
                        background-color: white;
                        font-weight: bold;
                    }

                    &:active {
                        color: hotpink;
                    }

                    &:checked {
                        background: hotpink;
                        color: white;
                    }

                    &::checkmark {
                        display: none;
                    }

                    &:first-child {
                        border: 0;
                    }
                }
            }
        }

        .btns {
            display: flex;
            justify-content: end;
            gap: 10px;
            margin-top: 10px;

        }

        .btn {
            padding: 9px;
            border-radius: 12px;
            cursor: pointer;
            border: 2px solid hotpink;

            &:hover {
                background-color: hotpink;
            }
        }

        .btn-ok {
            background: white;
        }
    </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body>
    <script>
        <?php

        $token = '---';


        $cities = [
            'Moscow' => [
                'name' => 'Москва',
                'phone' => '555-55-55'
            ],
            'Samara' => [
                'name' => 'Самара',
                'phone' => '333-33-33'
            ],
            'Ufa' => [
                'name' => 'Уфа',
                'phone' => '777-77-77'
            ]
        ];
        ?>
        var citySelect = null;
        var changeUser = false;


        function setDigits(digits) {
            $('.digits').text(digits);
        }

        function removeInfo() {
            $('.wrapper').hide();
            $('#info').hide();
        }

        function setCity() {
            let option = citySelect.find('option:selected').first();

            if (option.attr('phone')) {

                setDigits(option.attr('phone'));
                if (changeUser) {
                    removeInfo();
                }

            }
        }
    </script>
    <div class="wrapper"></div>


    <div class="p-15 b-black" id="header">
        <div class="page-info">
            <span>Контакты</span>
            <span class="city">
                <select name="city" id="city-select" class="select" onchange="setCity()">
                    <?php foreach ($cities as $key => $city): ?>
                        <option
                            value="<?= $key ?>"
                            phone="<?= $city['phone'] ?>"
                            city-name="<?= $city['name'] ?>">
                            <?= $city['name'] ?>
                        </option>
                    <?php endforeach; ?>
                </select>

            </span>
        </div>

        <span class="phone">8-800-<span class='digits'></span></span>
    </div>
    <div id="main" class="p-15">
        <div id="info">
            Ваш город <span id="ask-city">Москва</span>?
            <div class="btns">
                <div class="btn btn-ok" onclick="removeInfo()">Да</div>
            </div>
        </div>

    </div>
    <div class="p-15 b-black" id="footer">
        <span class="phone">8-800-<span class='digits'></span></span>
    </div>

    <script>
        citySelect = $('#city-select');
        setCity();

        var url = "https://suggestions.dadata.ru/suggestions/api/4_1/rs/iplocate/address?ip=";
        var token = "<?= $token ?>";
        var query = "<?= $_SERVER['REMOTE_ADDR'] ?>";

        var options = {
            method: "GET",
            mode: "cors",
            headers: {
                "Content-Type": "application/json",
                "Accept": "application/json",
                "Authorization": "Token " + token
            }
        }

        fetch(url + query, options)
            .then(response => response.json())
            .then((result) => {

        let option = citySelect.find('option[city-name="' + result.location.data.city + '"').first();

        if (option.attr('phone')) {
            $('#ask-city').text(result.location.data.city);
            $('#info').show();
            option.prop('selected', true);
            citySelect.trigger('change');
        }
        changeUser = true;
        })
        .catch(error => console.log("error", error));
    </script>

</body>

</html>
