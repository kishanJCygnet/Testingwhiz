import{R as a,a as i}from"./RequiresUpdate.1db018cd.js";const d={methods:{getExcludedActivationTabs(r){if(!this.isUnlicensed&&this.$addons.isActive(r)&&!this.$addons.requiresUpgrade(r))return[];const t=[];return this.$router.options.routes.forEach(e=>{if(!e.meta||!e.meta.middleware)return;(Array.isArray(e.meta.middleware)?e.meta.middleware:[e.meta.middleware]).some(s=>s===a)&&t.push(e.name)}),t}}},m={methods:{getExcludedUpdateTabs(r){if(!this.isUnlicensed&&this.$addons.hasMinimumVersion(r)&&!this.$addons.requiresUpgrade(r))return[];const t=[];return this.$router.options.routes.forEach(e=>{if(!e.meta||!e.meta.middleware)return;(Array.isArray(e.meta.middleware)?e.meta.middleware:[e.meta.middleware]).some(s=>s===i)&&t.push(e.name)}),t}}};export{d as R,m as a};
