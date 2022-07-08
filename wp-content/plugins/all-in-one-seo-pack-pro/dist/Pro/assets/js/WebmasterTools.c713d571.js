var l=Object.defineProperty,c=Object.defineProperties;var u=Object.getOwnPropertyDescriptors;var o=Object.getOwnPropertySymbols;var p=Object.prototype.hasOwnProperty,d=Object.prototype.propertyIsEnumerable;var a=(s,t,e)=>t in s?l(s,t,{enumerable:!0,configurable:!0,writable:!0,value:e}):s[t]=e,n=(s,t)=>{for(var e in t||(t={}))p.call(t,e)&&a(s,e,t[e]);if(o)for(var e of o(t))d.call(t,e)&&a(s,e,t[e]);return s},r=(s,t)=>c(s,u(t));import{b as i,a as g}from"./index.6b238922.js";import"./ToolsSettings.d33ae322.js";import"./context.04ada340.js";import{M as f}from"./MetaTag.ceacc375.js";const E={data(){return{roles:[{label:"Administrator",name:"administrator",description:this.$t.sprintf("By default Admins have access to %1$sall SEO site settings%2$s","<strong>","</strong>")},{label:"Editor",name:"editor",description:this.$t.sprintf("By default Editors have access to %1$sSEO settings for General Settings, Search Appearance and Social Networks, as well as all settings for individual pages and posts.%2$s","<strong>","</strong>")},{label:"Author",name:"author",description:this.$t.sprintf("By default Authors have access to %1$sSEO settings for individual pages and posts that they already have permission to edit.%2$s","<strong>","</strong>")},{label:"Contributor",name:"contributor",description:this.$t.sprintf("By default Contributors have access to %1$sSEO settings for individual pages and posts that they already have permission to edit.%2$s","<strong>","</strong>")},{label:"SEO Manager",name:"seoManager",description:this.$t.sprintf("By default SEO Managers have access to %1$sSEO settings for General Settings, Redirections, and individual pages and posts.%2$s","<strong>","</strong>")},{label:"SEO Editor",name:"seoEditor",description:this.$t.sprintf("By default SEO Editors have access to %1$sSEO settings for individual pages and posts.%2$s","<strong>","</strong>")}],strings:{tooltip:this.$t.sprintf("By default, only users with an Administrator role have permission to manage %1$s within your WordPress admin area. With Access Controls, though, you can easily extend specific access permissions to other user roles.","All in One SEO"),accessControl:"Access Control Settings",useDefaultSettings:"Use Default Settings"}}},computed:r(n({},i(["settings"])),{getRoles(){return this.roles.concat(Object.keys(this.$aioseo.user.customRoles).map(s=>({label:this.$aioseo.user.roles[s],name:s,description:this.$t.sprintf("By default the %1$s role %2$shas no access%3$s to %4$s settings.",this.$aioseo.user.roles[s],"<strong>","</strong>","All in One SEO"),dynamic:!0})))}})},O={mixins:[f],props:{tool:{type:Object,required:!0},isConnected:{type:Boolean,default(){return!1}}},computed:n(n({},i(["isUnlicensed"])),g(["options"]))};export{E as A,O as W};