<template>
    <div>
        <h1>{{ greeting }}</h1>
        <p>저희 웹사이트에 방문해주셔서 감사합니다!</p>
        <p>여기서 다양한 상품들을 살펴보세요.</p>
        <button @click="redirectToCoupangBest" class="main-button">
            쿠팡 식품 이달의 BEST 식품 보러가기
        </button>
    </div>
</template>

<script>
export default {
    setup() {
        const greeting = "환영합니다!";

        const redirectToCoupangBest = () => {
            window.location.href = "/coupang-best";
        };

        return {
            greeting,
            redirectToCoupangBest,
        };
    },
};
</script>
