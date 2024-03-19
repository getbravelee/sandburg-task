<template>
    <div>
        <!-- 각 섹션 제목과 데이터 표시 -->
        <div
            v-for="(section, sectionIndex) in sectionedData"
            :key="sectionIndex"
        >
            <h2>{{ section.title }}</h2>
            <!-- 섹션 제목 표시 -->
            <table>
                <thead>
                    <tr>
                        <th>Index</th>
                        <th>상품명</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- 섹션 내 데이터 표시 -->
                    <tr
                        v-for="(item, itemIndex) in section.data"
                        :key="itemIndex"
                    >
                        <td>{{ itemIndex }}</td>
                        <!-- 인덱스 표시 -->
                        <td>
                            <a :href="item.link" target="_blank">{{
                                item.name
                            }}</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            crawledData: [],
            sectionTitles: [
                "생수 / 음료",
                "커피 / 원두 / 차",
                "과자 / 초콜릿 / 시리얼",
                "우유 / 두유",
                "면 / 통조림 / 가공식품",
                "장 / 소스 / 가루 / 조미료",
            ],
        };
    },
    computed: {
        // 섹션별로 데이터를 나누고 인덱스를 재설정하는 computed 속성
        sectionedData() {
            const sectionSize = 16; // 섹션 크기 설정
            const sectionedData = [];

            // 각 섹션에 대해 데이터를 분할하여 재설정
            for (let i = 0; i < this.sectionTitles.length; i++) {
                const sectionData = this.crawledData.slice(
                    i * sectionSize,
                    (i + 1) * sectionSize
                );
                sectionedData.push({
                    title: this.sectionTitles[i],
                    data: sectionData.map((item, index) => {
                        // 각 항목의 인덱스를 섹션 내에서 재설정
                        item.index = index;
                        return item;
                    }),
                });
            }

            return sectionedData;
        },
    },
    mounted() {
        // 컴포넌트가 마운트되면 JSON 파일을 가져와서 데이터를 로드
        this.loadCrawledData();
    },
    methods: {
        async loadCrawledData() {
            try {
                // JSON 파일 경로를 지정 (예시로는 public 폴더에 위치한 파일을 가정)
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
    background-color: #eee;
}
</style>
