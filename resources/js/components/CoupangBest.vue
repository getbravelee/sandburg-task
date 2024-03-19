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
                <tr v-for="(item, index) in crawledData" :key="index">
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
            crawledData: [],
        };
    },
    mounted() {
        // 컴포넌트가 마운트되면 JSON 파일을 가져와서 데이터를 로드합니다.
        this.loadCrawledData();
    },
    methods: {
        async loadCrawledData() {
            try {
                // JSON 파일 경로를 지정합니다. 예시로는 public 폴더에 위치한 파일을 가정합니다.
                const response = await fetch("/coupangBestData.json");
                const data = await response.json();
                this.crawledData = data;
            } catch (error) {
                console.error("Error loading crawled data:", error);
            }
        },
    },
};
</script>

<style>
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
