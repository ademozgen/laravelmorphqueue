<template>
    <component :is="layout">
        <slot></slot>
    </component>
</template>
<script>
    import AdminLayout from "./AdminLayout";
    import AuthLayout from "./AuthLayout";
    export default {
        computed: {
            layout () {
                if (this.$route.meta.layout === 'admin') {
                    return AdminLayout
                } else if (this.$route.meta.layout === 'auth') {
                    return AuthLayout
                }
                else {
                    return AdminLayout
                }
            }
        },

    };
</script>
