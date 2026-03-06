<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        /* Tambahkan gaya tampilan jika diperlukan */
        .combobox {
            position: relative;
            display: inline-block;
        }

        .combobox select,
        .combobox input {
            width: 200px;
            padding: 8px;
            font-size: 16px;
        }

        .combobox input {
            position: absolute;
            top: 0;
            left: 0;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            z-index: 1;
            width: 100%;
            max-height: 150px;
            overflow-y: auto;
        }

        .dropdown-content a {
            padding: 12px 16px;
            display: block;
            cursor: pointer;
        }

        .dropdown-content a:hover {
            background-color: #ddd;
        }
    </style>
</head>

<body>

    <div class="combobox">
        <input type="text" id="searchInput" oninput="filterFunction()" placeholder="Cari...">
        <select id="mySelect" onclick="toggleDropdown()">
            <option value="option1">Pilihan 1</option>
            <option value="option2">Pilihan 2</option>
            <option value="option3">Pilihan 3</option>
            <option value="option4">Pilihan 4</option>
            <!-- Tambahkan opsi sesuai kebutuhan -->
        </select>
        <div id="myDropdown" class="dropdown-content">
            <a href="#" onclick="selectOption('option1')">Pilihan 1</a>
            <a href="#" onclick="selectOption('option2')">Pilihan 2</a>
            <a href="#" onclick="selectOption('option3')">Pilihan 3</a>
            <a href="#" onclick="selectOption('option4')">Pilihan 4</a>
            <!-- Tambahkan opsi sesuai kebutuhan -->
        </div>
    </div>

    <script>
        function filterFunction() {
            var input, filter, div, a, i;
            input = document.getElementById("searchInput");
            filter = input.value.toUpperCase();
            div = document.getElementById("myDropdown");
            a = div.getElementsByTagName("a");
            for (i = 0; i < a.length; i++) {
                var txtValue = a[i].textContent || a[i].innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    a[i].style.display = "";
                } else {
                    a[i].style.display = "none";
                }
            }
        }

        function selectOption(value) {
            document.getElementById("mySelect").value = value;
            document.getElementById("searchInput").value = "";
            filterFunction();
        }

        function toggleDropdown() {
            document.getElementById("myDropdown").style.display = "block";
        }
    </script>

</body>

</html>
