<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coupang Best [식품]</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Coupang Best Items</h1>
    <table id="hotelTable">
        <thead>
            <tr>
                <th>Index</th>
                <th>상품명</th>
            </tr>
        </thead>
        <tbody>
            <!-- 크롤링한 데이터가 여기에 추가될 것입니다. -->
        </tbody>
    </table>

    <script>
        // 크롤링한 데이터를 표에 추가하는 함수
        function addRow(index, name) {
            var table = document
                .getElementById("hotelTable")
                .getElementsByTagName("tbody")[0];
            var newRow = table.insertRow();
            var cell1 = newRow.insertCell(0);
            var cell2 = newRow.insertCell(1);
            cell1.innerHTML = index;
            cell2.innerHTML = name;
        }

        // coupangBestData.json 파일에서 크롤링한 데이터를 가져와서 표에 추가하는 함수
        function addCrawledData() {
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "coupangBestData.json", true);
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    var crawledData = JSON.parse(xhr.responseText);
                    crawledData.forEach(function (item) {
                        addRow(item.index, item.name);
                    });
                }
            };
            xhr.send();
        }

        // coupangBestData.json 파일에서 크롤링한 데이터를 가져와서 표에 추가하는 함수 호출
        addCrawledData();
    </script>

    <script src="js/test.js"></script>
</body>
</html>