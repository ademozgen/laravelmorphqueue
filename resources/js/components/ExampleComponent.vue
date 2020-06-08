<template>
    <ul>
        {{ $t('menu') }}
        <li v-for="locale in supportedLocales" :key="locale" @click="switchLocale(locale)">
            {{ $t('menu.' + locale) }}
        </li>
    </ul>
</template>

<script>
    import {Trans} from "../plugins/Translation";

    export default {
        computed: {
            supportedLocales () {
                return Trans.supportedLocales
            },
        },
        methods: {
            switchLocale(locale) {
                if (this.$i18n.locale !== locale) {
                    const to = this.$router.resolve({ params: {locale} })
                    return Trans.changeLocale(locale).then(() => {
                        console.log("dil değiştiridm");
                    })
                }
            }
        }
    }
</script>

<style scoped>
    li {
        text-decoration: underline;
        color: #459CE7;
        cursor: pointer;
    }
</style>
