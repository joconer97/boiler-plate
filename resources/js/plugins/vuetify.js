import '@mdi/font/css/materialdesignicons.css';
import Vue from 'vue'
import Vuetify from 'vuetify'
import 'vuetify/dist/vuetify.min.css'

Vue.use(Vuetify);

export default new Vuetify({
    icons: {
        iconfont: 'mdi',
    },
    theme: {
        dark: false,
        themes: {
            light: {
                primary: '#18A0FB',
                secondary: '#E92222',
                accent: '#ED6A27',
            },
            dark: {
                primary: '#3484F0',
                secondary: '#616161',
                accent: '#ED6A27',
            }
        },
    }
});