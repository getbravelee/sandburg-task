<template>
    <div>
        <h1>Coupang Best Items</h1>
        <table>
            <thead>
                <tr>
                    <th>Index</th>
                    <th>상품명</th>
                </tr>
            </thead>
            <tbody>
                <!-- 크롤링한 데이터를 표시할 부분 -->
                <tr v-for="item in crawledData" :key="item.index">
                    <td>{{ item.index }}</td>
                    <td>{{ item.name }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
export default {
    data() {
        return {
            crawledData: [], // 크롤링한 데이터를 저장할 배열
        };
    },
    mounted() {
        // 컴포넌트가 마운트된 후에 크롤링한 데이터를 가져옴
        this.fetchCrawledData();
    },
    methods: {
        fetchCrawledData() {
            // AJAX 또는 axios를 사용하여 서버에서 크롤링한 데이터를 가져옴
            // 여기서는 간단히 정적 데이터를 사용하겠습니다.
            // 서버에서 가져오는 방법에 따라 수정이 필요할 수 있습니다.
            fetch("coupangBestData.json")
                .then((response) => response.json())
                .then((data) => {
                    this.crawledData = data;
                })
                .catch((error) => {
                    console.error("Error fetching crawled data:", error);
                });
        },
    },
};
</script>

<style scoped>
table {
    width: 100%;
    border-collapse: collapse;
}
th,
td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
}
th {
    background-color: #f2f2f2;
}
</style>
