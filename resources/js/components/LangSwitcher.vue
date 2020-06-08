<template>
    <v-menu offset-y>
        <template v-slot:activator="{ on: menu }">
            <v-tooltip bottom>
                <template v-slot:activator="{ on: tooltip }">
                    <v-btn
                        icon
                        v-on="{ ...tooltip, ...menu }"
                    >
                        <v-avatar
                            size="32px"
                            item
                        >
                            <v-img
                                :src="languages[0].flagSrc"
                                alt="Vuetify"
                            ></v-img></v-avatar>
                    </v-btn>
                </template>
                <span>Switch Language</span>
            </v-tooltip>
        </template>
        <v-list>
            <v-list-item
                v-for="language in languages"
                :key="language.id"
                @click="changeLanguage(language.id)"
            >
                <v-list-item-avatar
                    tile
                    size="24"
                >
                    <v-img :src="language.flagSrc"></v-img>
                </v-list-item-avatar>
                <v-list-item-title>{{ language.title }}</v-list-item-title>
            </v-list-item>
        </v-list>
    </v-menu>
</template>

<script>
    export default {
        props: {
            languages: {
                type: Array,
                required: true
            },
            currentLanguage: {
                type: String,
                required: false,
                default: null
            }
        },
        computed: {
            currentLanguageIcon() {
                return this.languages[0].flagSrc;
            }
        },
        methods: {
            changeLanguage(id) {
                this.$emit("languageChanged", id);
            }
        }
    };
</script>

<style lang="scss" scoped></style>
