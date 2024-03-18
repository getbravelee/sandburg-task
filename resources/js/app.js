import "./bootstrap";

import { createApp } from "vue";
import HelloWorld from "./components/Test.vue";

const app = createApp({});
app.component("hello-world", HelloWorld).mount("#app");
