import{a4 as i}from"./vendor.f6bbc087.js";import{n as a}from"./vueComponentNormalizer.4c221f82.js";var s=function(){var e=this,n=e.$createElement,t=e._self._c||n;return t("maz-phone-number-input",{staticClass:"aioseo-phone-number",class:{invalidNumber:e.isInvalidNumber,validNumber:e.isValidNumber},attrs:{noValidation:"",noExample:"",showCodeOnList:"","ignored-countries":["KP"],preferredCountries:["US","GB","CA","AU","JP","RU","IN","TR","BR","MX"],placeholder:" "},on:{update:e.emit},model:{value:e.phoneNumber,callback:function(o){e.phoneNumber=o},expression:"phoneNumber"}})},u=[];const l={components:{MazPhoneNumberInput:i},props:{value:String},data(){return{phoneNumber:this.value,isInvalidNumber:!1,isValidNumber:!1}},methods:{emit(e){return this.isInvalidNumber=!1,this.isValidNumber=!1,e.isValid?(this.isValidNumber=!0,this.$emit("inputFormatted","+"+e.countryCallingCode+" "+e.formatNational),this.$emit("input",e.formattedNumber)):(e.formattedNumber&&(this.isInvalidNumber=!0),this.$emit("input",""))}},mounted(){const e=this.$moment().unix(),n="aioseo-phone-number-"+e.toString();document.querySelectorAll(".aioseo-phone-number input").forEach(t=>{t.setAttribute("autocomplete",n)})}},r={};var m=a(l,s,u,!1,c,null,null,null);function c(e){for(let n in r)this[n]=r[n]}var d=function(){return m.exports}();export{d as B};