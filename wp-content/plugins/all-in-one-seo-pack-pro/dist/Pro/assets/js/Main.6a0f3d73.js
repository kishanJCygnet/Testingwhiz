var S=Object.defineProperty,k=Object.defineProperties;var y=Object.getOwnPropertyDescriptors;var l=Object.getOwnPropertySymbols;var $=Object.prototype.hasOwnProperty,w=Object.prototype.propertyIsEnumerable;var u=(s,e,t)=>e in s?S(s,e,{enumerable:!0,configurable:!0,writable:!0,value:t}):s[e]=t,o=(s,e)=>{for(var t in e||(e={}))$.call(e,t)&&u(s,t,e[t]);if(l)for(var t of l(e))w.call(e,t)&&u(s,t,e[t]);return s},r=(s,e)=>k(s,y(e));import{N as b}from"./ToolsSettings.83ed8357.js";import{d as c,e as v,j as f}from"./index.a8d44ca5.js";import{n}from"./vueComponentNormalizer.87056a83.js";import{C as x}from"./Card.40fd6ded.js";import{C as A,S as L,a as N}from"./SitemapsPro.24c6015d.js";import{C as E}from"./GettingStarted.324d7788.js";import{C as M,a as O}from"./Index.529d15ef.js";import{a as z,C as U}from"./Overview.57bbd3e6.js";import{p as R}from"./popup.25df8419.js";import{S as C}from"./SeoSiteScore.8753b911.js";import{C as T}from"./Blur.8490ecd2.js";import{C as V}from"./Index.8ed62ab8.js";import{C as H}from"./Tooltip.674a9fb4.js";import{C as P}from"./Index.c3eb88e6.js";import{G as q,a as D}from"./Row.13b6f3f1.js";import{S as G}from"./Book.b6a9040c.js";import{a as I,S as Z}from"./Build.1297b1bd.js";import{S as B}from"./QuestionMark.83ebd18e.js";import{S as F}from"./History.99f81129.js";import{S as W}from"./Message.ec85dd4f.js";import{S as j}from"./Redirect.097ea471.js";import{S as K}from"./Rocket.8cc34606.js";import{S as Y}from"./VideoCamera.896ed18d.js";import"./index.9b0095cc.js";import"./client.93f15631.js";import"./Slide.f5d21606.js";import"./params.bea1a08d.js";import"./Url.781a1d48.js";import"./Index.1acf3545.js";/* empty css             */import"./Header.ee6fed3f.js";import"./LicenseKeyBar.850cb053.js";import"./LogoGear.0c3dd5e3.js";import"./AnimatedNumber.b6059bfd.js";import"./Logo.1a5e022a.js";import"./Support.b1f25bbd.js";import"./Tabs.6bae0a8a.js";import"./TruSeoScore.a520926e.js";import"./Information.f4b75b56.js";import"./Close.5e7bcb70.js";import"./Exclamation.356738ce.js";import"./Gear.c974e953.js";import"./External.8868c638.js";import"./DonutChartWithLegend.fe87aad2.js";var Q=function(){var s=this,e=s.$createElement,t=s._self._c||e;return t("div",{staticClass:"aioseo-site-score-dashboard"},[s.analyzeError?s._e():t("div",{staticClass:"aioseo-seo-site-score-score"},[t("core-site-score",{attrs:{loading:s.loading,score:s.score,description:s.description}})],1),s.analyzeError?s._e():t("div",{staticClass:"aioseo-seo-site-score-recommendations"},[t("div",{staticClass:"critical"},[t("span",{staticClass:"round red"},[s._v(s._s(s.summary.critical||0))]),s._v(" "+s._s(s.strings.criticalIssues)+" ")]),t("div",{staticClass:"recommended"},[t("span",{staticClass:"round blue"},[s._v(s._s(s.summary.recommended||0))]),s._v(" "+s._s(s.strings.recommendedImprovements)+" ")]),t("div",{staticClass:"good"},[t("span",{staticClass:"round green"},[s._v(s._s(s.summary.good||0))]),s._v(" "+s._s(s.strings.goodResults)+" ")]),s.$allowed("aioseo_seo_analysis_settings")?t("div",{staticClass:"links"},[t("a",{attrs:{href:s.$aioseo.urls.aio.seoAnalysis}},[s._v(s._s(s.strings.completeSiteAuditChecklist))]),t("a",{staticClass:"no-underline",attrs:{href:s.$aioseo.urls.aio.seoAnalysis}},[s._v("\u2192")])]):s._e()]),s.analyzeError?t("div",{staticClass:"analyze-errors"},[t("h3",[s._v(s._s(s.strings.anErrorOccurred))]),s._v(" "+s._s(s.getError)+" ")]):s._e()])},X=[];const J={components:{CoreSiteScore:V},mixins:[C],props:{score:Number,loading:Boolean,summary:{type:Object,default(){return{}}}},data(){return{strings:{anErrorOccurred:"An error occurred while analyzing your site.",criticalIssues:"Important Issues",warnings:"Warnings",recommendedImprovements:"Recommended Improvements",goodResults:"Good Results",completeSiteAuditChecklist:"Complete Site Audit Checklist"}}},computed:r(o({},c(["analyzeError"])),{getError(){switch(this.analyzeError){case"invalid-url":return"The URL provided is invalid.";case"missing-content":return"We were unable to parse the content for this site.";case"invalid-token":return this.$t.sprintf("Your site is not connected. Please connect to %1$s, then try again.","AIOSEO")}return this.analyzeError}})},d={};var ss=n(J,Q,X,!1,ts,null,null,null);function ts(s){for(let e in d)this[e]=d[e]}var es=function(){return ss.exports}(),is=function(){var s=this,e=s.$createElement,t=s._self._c||e;return t("div",{staticClass:"aioseo-seo-site-score"},[s.options.general.licenseKey?s._e():t("core-blur",[t("core-site-score-dashboard",{attrs:{score:85,description:s.description}})],1),s.options.general.licenseKey?s._e():t("div",{staticClass:"aioseo-seo-site-score-cta"},[t("a",{attrs:{href:s.$aioseo.urls.aio.settings}},[s._v(s._s(s.strings.enterLicenseKey))]),s._v(" "+s._s(s.strings.toSeeYourSiteScore)+" ")]),s.options.general.licenseKey?t("core-site-score-dashboard",{attrs:{score:s.internalOptions.internal.siteAnalysis.score,description:s.description,loading:s.analyzing,summary:s.getSummary}}):s._e()],1)},os=[];const rs={components:{CoreBlur:T,CoreSiteScoreDashboard:es},mixins:[C],computed:r(o(o({},c(["internalOptions","options","analyzing"])),v(["goodCount","recommendedCount","criticalCount"])),{getSummary(){return{recommended:this.recommendedCount(),critical:this.criticalCount(),good:this.goodCount()}}}),methods:r(o({},f(["saveConnectToken","runSiteAnalyzer"])),{openPopup(s){R(s,this.connectWithAioseo,600,630,!0,["token"],this.completedCallback,this.closedCallback)},completedCallback(s){return this.saveConnectToken(s.token)},closedCallback(s){s&&this.runSiteAnalyzer(),this.$store.commit("analyzing",!0)}}),mounted(){!this.internalOptions.internal.siteAnalysis.score&&this.options.general.licenseKey&&(this.$store.commit("analyzing",!0),this.runSiteAnalyzer())}},m={};var ns=n(rs,is,os,!1,as,null,null,null);function as(s){for(let e in m)this[e]=m[e]}var cs=function(){return ns.exports}(),ls=function(){var s=this,e=s.$createElement,t=s._self._c||e;return t("svg",{staticClass:"aioseo-svg-clipboard-checkmark",attrs:{viewBox:"0 0 28 28",fill:"none",xmlns:"http://www.w3.org/2000/svg"}},[t("path",{attrs:{"fill-rule":"evenodd","clip-rule":"evenodd",d:"M17.29 4.66668H22.1667C23.45 4.66668 24.5 5.71668 24.5 7.00001V23.3333C24.5 24.6167 23.45 25.6667 22.1667 25.6667H5.83333C5.67 25.6667 5.51833 25.655 5.36667 25.6317C4.91167 25.5383 4.50333 25.305 4.18833 24.99C3.97833 24.7683 3.80333 24.5233 3.68667 24.2433C3.57 23.9633 3.5 23.6483 3.5 23.3333V7.00001C3.5 6.67334 3.57 6.37001 3.68667 6.10168C3.80333 5.82168 3.97833 5.56501 4.18833 5.35501C4.50333 5.04001 4.91167 4.80668 5.36667 4.71334C5.51833 4.67834 5.67 4.66668 5.83333 4.66668H10.71C11.2 3.31334 12.4833 2.33334 14 2.33334C15.5167 2.33334 16.8 3.31334 17.29 4.66668ZM19.355 10.01L21 11.6667L11.6667 21L7 16.3334L8.645 14.6884L11.6667 17.6984L19.355 10.01ZM14 4.37501C14.4783 4.37501 14.875 4.77168 14.875 5.25001C14.875 5.72834 14.4783 6.12501 14 6.12501C13.5217 6.12501 13.125 5.72834 13.125 5.25001C13.125 4.77168 13.5217 4.37501 14 4.37501ZM5.83333 23.3333H22.1667V7.00001H5.83333V23.3333Z",fill:"currentColor"}})])},us=[];const ds={},p={};var ms=n(ds,ls,us,!1,ps,null,null,null);function ps(s){for(let e in p)this[e]=p[e]}var gs=function(){return ms.exports}(),_s=function(){var s=this,e=s.$createElement,t=s._self._c||e;return t("svg",{staticClass:"aioseo-location-pin",attrs:{viewBox:"0 0 28 28",fill:"none",xmlns:"http://www.w3.org/2000/svg"}},[t("path",{attrs:{"fill-rule":"evenodd","clip-rule":"evenodd",d:"M13.9999 2.33331C17.8616 2.33331 20.9999 5.47165 20.9999 9.33331C20.9999 14.5833 13.9999 22.1666 13.9999 22.1666C13.9999 22.1666 6.99992 14.5833 6.99992 9.33331C6.99992 5.47165 10.1383 2.33331 13.9999 2.33331ZM22.1666 25.6666V23.3333H5.83325V25.6666H22.1666ZM9.33325 9.33331C9.33325 6.75498 11.4216 4.66665 13.9999 4.66665C16.5783 4.66665 18.6666 6.75498 18.6666 9.33331C18.6666 11.8183 16.2399 15.7033 13.9999 18.5616C11.7599 15.715 9.33325 11.8183 9.33325 9.33331ZM11.6666 9.33331C11.6666 8.04998 12.7166 6.99998 13.9999 6.99998C15.2833 6.99998 16.3333 8.04998 16.3333 9.33331C16.3333 10.6166 15.2949 11.6666 13.9999 11.6666C12.7166 11.6666 11.6666 10.6166 11.6666 9.33331Z",fill:"currentColor"}})])},hs=[];const vs={},g={};var fs=n(vs,_s,hs,!1,Cs,null,null,null);function Cs(s){for(let e in g)this[e]=g[e]}var Ss=function(){return fs.exports}(),ks=function(){var s=this,e=s.$createElement,t=s._self._c||e;return t("svg",{staticClass:"aioseo-title-and-meta",attrs:{viewBox:"0 0 28 28",fill:"none",xmlns:"http://www.w3.org/2000/svg"}},[t("path",{attrs:{"fill-rule":"evenodd","clip-rule":"evenodd",d:"M22.75 4.08334L21 2.33334L19.25 4.08334L17.5 2.33334L15.75 4.08334L14 2.33334L12.25 4.08334L10.5 2.33334L8.75 4.08334L7 2.33334L5.25 4.08334L3.5 2.33334V25.6667L5.25 23.9167L7 25.6667L8.75 23.9167L10.5 25.6667L12.25 23.9167L14 25.6667L15.75 23.9167L17.5 25.6667L19.25 23.9167L21 25.6667L22.75 23.9167L24.5 25.6667V2.33334L22.75 4.08334ZM22.1667 22.2717H5.83333V5.72833H22.1667V22.2717ZM21 17.5H7V19.8333H21V17.5ZM7 12.8333H21V15.1667H7V12.8333ZM21 8.16668H7V10.5H21V8.16668Z",fill:"currentColor"}})])},ys=[];const $s={},_={};var ws=n($s,ks,ys,!1,bs,null,null,null);function bs(s){for(let e in _)this[e]=_[e]}var xs=function(){return ws.exports}(),As=function(){var s=this,e=s.$createElement,t=s._self._c||e;return t("div",{staticClass:"aioseo-dashboard"},[t("core-main",{attrs:{"page-name":s.strings.pageName,"show-tabs":!1,"show-save-button":!1}},[t("div",[s.settings.showSetupWizard&&s.$allowed("aioseo_setup_wizard")?t("div",{staticClass:"dashboard-getting-started"},[t("core-getting-started")],1):s._e(),t("grid-row",[t("grid-column",{attrs:{md:"6"}},[t("core-card",{attrs:{slug:"dashboardOverview","header-text":s.strings.seoOverview}},[t("core-overview")],1),s.$aioseo.setupWizard.isCompleted?s._e():t("core-card",{attrs:{slug:"dashboardSeoSetup","header-text":s.strings.seoSetup}},[t("core-seo-setup")],1),s.quickLinks.length>0?t("grid-row",[t("grid-column",[t("div",{staticClass:"aioseo-quicklinks-title"},[s._v(" "+s._s(s.strings.quicklinks)+" "),t("core-tooltip",{scopedSlots:s._u([{key:"tooltip",fn:function(){return[s._v(" "+s._s(s.strings.quicklinksTooltip)+" ")]},proxy:!0}],null,!1,1392699054)},[t("svg-circle-question-mark")],1)],1)]),s._l(s.quickLinks,function(i,a){return t("grid-column",{key:a,staticClass:"aioseo-quicklinks-cards",attrs:{lg:"6"}},[t("core-feature-card",{attrs:{feature:i,"can-activate":!1,"can-manage":s.$allowed(i.access),"static-card":""},scopedSlots:s._u([{key:"title",fn:function(){return[t(i.icon,{tag:"component"}),s._v(" "+s._s(i.name)+" ")]},proxy:!0},{key:"description",fn:function(){return[s._v(" "+s._s(i.description)+" ")]},proxy:!0}],null,!0)})],1)})],2):s._e()],1),t("grid-column",{attrs:{md:"6"}},[t("core-card",{attrs:{slug:"dashboardSeoSiteScore","header-text":s.strings.seoSiteScore}},[t("core-seo-site-score")],1),t("core-card",{staticClass:"dashboard-notifications",attrs:{slug:"dashboardNotifications"},scopedSlots:s._u([{key:"header",fn:function(){return[s.notificationsCount?t("div",{staticClass:"notifications-count"},[s._v(" ("+s._s(s.notificationsCount)+") ")]):s._e(),t("div",[s._v(s._s(s.notificationTitle))]),s.dismissed?t("a",{staticClass:"show-dismissed-notifications",attrs:{href:"#"},on:{click:function(i){i.preventDefault(),s.dismissed=!1}}},[s._v(s._s(s.strings.activeNotifications))]):s._e()]},proxy:!0}])},[t("core-notification-cards",{attrs:{notifications:s.filteredNotifications,dismissedCount:s.dismissedNotificationsCount},on:{"toggle-dismissed":function(i){s.dismissed=!s.dismissed}},scopedSlots:s._u([{key:"no-notifications",fn:function(){return[t("div",{staticClass:"no-dashboard-notifications"},[t("div",[s._v(" "+s._s(s.strings.noNewNotificationsThisMoment)+" ")]),s.dismissedNotificationsCount?t("a",{attrs:{href:"#"},on:{click:function(i){i.preventDefault(),s.dismissed=!0}}},[s._v(s._s(s.strings.seeAllDismissedNotifications))]):s._e()])]},proxy:!0}])}),s.filteredNotifications.length&&(!s.dismissed||3<s.filteredNotifications.length)?t("div",{staticClass:"notification-footer"},[t("div",{staticClass:"more-notifications"},[s.notifications.length>s.visibleNotifications?[t("a",{attrs:{href:"#"},on:{click:function(i){return i.stopPropagation(),i.preventDefault(),s.toggleNotifications.apply(null,arguments)}}},[s._v(s._s(s.moreNotifications))]),t("a",{staticClass:"no-underline",attrs:{href:"#"},on:{click:function(i){return i.stopPropagation(),i.preventDefault(),s.toggleNotifications.apply(null,arguments)}}},[s._v("\u2192")])]:s._e()],2),s.dismissed?s._e():t("div",{staticClass:"dismiss-all"},[s.notifications.length?t("a",{staticClass:"dismiss",attrs:{href:"#"},on:{click:function(i){return i.stopPropagation(),i.preventDefault(),s.processDismissAllNotifications.apply(null,arguments)}}},[s._v(s._s(s.strings.dismissAll))]):s._e()])]):s._e()],1),t("core-card",{staticClass:"dashboard-support",attrs:{slug:"dashboardSupport","header-text":s.strings.support}},s._l(s.supportOptions,function(i,a){return t("div",{key:a,staticClass:"aioseo-settings-row"},[t("a",{attrs:{href:i.link,target:i.blank?"_blank":null}},[t(i.icon,{tag:"component"}),s._v(" "+s._s(i.text)+" ")],1)])}),0),s.isUnlicensed?t("cta",{staticClass:"dashboard-cta",attrs:{type:3,floating:!1,"cta-link":s.$links.utmUrl("dashboard-cta"),"feature-list":s.$constants.UPSELL_FEATURE_LIST,"button-text":s.strings.ctaButton,"learn-more-link":s.$links.getUpsellUrl("dashboard-cta",null,"home")},scopedSlots:s._u([{key:"header-text",fn:function(){return[s._v(" "+s._s(s.strings.ctaHeaderText)+" ")]},proxy:!0}],null,!1,2059824803)}):s._e()],1)],1)],1)])],1)},Ls=[];const Ns={components:{CoreCard:x,CoreFeatureCard:A,CoreGettingStarted:E,CoreMain:M,CoreNotificationCards:O,CoreOverview:z,CoreSeoSetup:U,CoreSeoSiteScore:cs,CoreTooltip:H,Cta:P,GridColumn:q,GridRow:D,SvgBook:G,SvgBuild:I,SvgCircleQuestionMark:B,SvgClipboardCheckmark:gs,SvgHistory:F,SvgLinkAssistant:L,SvgLocationPin:Ss,SvgMessage:W,SvgRedirect:j,SvgRocket:K,SvgShare:Z,SvgSitemapsPro:N,SvgTitleAndMeta:xs,SvgVideoCamera:Y},mixins:[b],data(){return{dismissed:!1,visibleNotifications:3,strings:{pageName:"Dashboard",noNewNotificationsThisMoment:"There are no new notifications at this moment.",seeAllDismissedNotifications:"See all dismissed notifications.",seoSiteScore:"SEO Site Score",seoOverview:this.$t.sprintf("%1$s Overview","AIOSEO"),seoSetup:"SEO Setup",support:"Support",readSeoUserGuide:this.$t.sprintf("Read the %1$s user guide","All in One SEO"),accessPremiumSupport:"Access our Premium Support",viewChangelog:"View the Changelog",watchVideoTutorials:"Watch video tutorials",gettingStarted:"Getting started? Read the Beginners Guide",quicklinks:"Quicklinks",quicklinksTooltip:"You can use these quicklinks to quickly access our settings pages to adjust your site's SEO settings.",searchAppearance:"Search Appearance",manageSearchAppearance:"Configure how your website content will look in Google, Bing and other search engines.",seoAnalysis:"SEO Analysis",manageSeoAnalysis:"Check how your site scores with our SEO analyzer and compare against your competitor's site.",localSeo:"Local SEO",manageLocalSeo:"Improve local SEO rankings with schema for business address, open hours, contact, and more.",socialNetworks:"Social Networks",manageSocialNetworks:"Setup Open Graph for Facebook, Twitter, etc. to show the right content / thumbnail preview.",tools:"Tools",manageTools:"Fine-tune your site with our powerful tools including Robots.txt editor, import/export and more.",sitemap:"Sitemaps",manageSitemap:"Manage all of your sitemap settings, including XML, Video, News and more.",linkAssistant:"Link Assistant",manageLinkAssistant:"Manage existing links, get relevant suggestions for adding internal links to older content, discover orphaned posts and more.",redirects:"Redirection Manager",manageRedirects:"Easily create and manage redirects for your broken links to avoid confusing search engines and users, as well as losing valuable backlinks.",ctaHeaderText:this.$t.sprintf("Get more features in %1$s %2$s:","AIOSEO","Pro"),ctaButton:this.$t.sprintf("Upgrade to %1$s and Save %2$s","Pro","50%"),dismissAll:"Dismiss All",relaunchSetupWizard:"Relaunch Setup Wizard"}}},computed:r(o(o({},v(["isUnlicensed"])),c(["settings"])),{moreNotifications(){return this.$t.sprintf("You have %1$s more notifications",this.remainingNotificationsCount)},remainingNotificationsCount(){return this.notifications.length-this.visibleNotifications},filteredNotifications(){return[...this.notifications].splice(0,this.visibleNotifications)},supportOptions(){const s=[{icon:"svg-book",text:this.strings.readSeoUserGuide,link:this.$links.utmUrl("dashboard-support-box","user-guide","doc-categories/getting-started/"),blank:!0},{icon:"svg-message",text:this.strings.accessPremiumSupport,link:this.$links.utmUrl("dashboard-support-box","premium-support","contact/"),blank:!0},{icon:"svg-history",text:this.strings.viewChangelog,link:this.$links.utmUrl("dashboard-support-box","changelog","changelog/"),blank:!0},{icon:"svg-book",text:this.strings.gettingStarted,link:this.$links.utmUrl("dashboard-support-box","beginners-guide","docs/quick-start-guide/"),blank:!0}];return this.$allowed("aioseo_setup_wizard")?this.settings.showSetupWizard?s:s.concat({icon:"svg-rocket",text:this.strings.relaunchSetupWizard,link:this.$aioseo.urls.aio.wizard,blank:!1}):s},quickLinks(){return[{icon:"svg-title-and-meta",description:this.strings.manageSearchAppearance,name:this.strings.searchAppearance,manageUrl:this.$aioseo.urls.aio.searchAppearance,access:"aioseo_search_appearance_settings"},{icon:"svg-clipboard-checkmark",description:this.strings.manageSeoAnalysis,name:this.strings.seoAnalysis,manageUrl:this.$aioseo.urls.aio.seoAnalysis,access:"aioseo_seo_analysis_settings"},{icon:"svg-location-pin",description:this.strings.manageLocalSeo,name:this.strings.localSeo,manageUrl:this.$aioseo.urls.aio.localSeo,access:"aioseo_local_seo_settings"},{icon:"svg-share",description:this.strings.manageSocialNetworks,name:this.strings.socialNetworks,manageUrl:this.$aioseo.urls.aio.socialNetworks,access:"aioseo_social_networks_settings"},{icon:"svg-build",description:this.strings.manageTools,name:this.strings.tools,manageUrl:this.$aioseo.urls.aio.tools,access:"aioseo_tools_settings"},{icon:"svg-sitemaps-pro",description:this.strings.manageSitemap,name:this.strings.sitemap,manageUrl:this.$aioseo.urls.aio.sitemaps,access:"aioseo_sitemap_settings"},{icon:"svg-link-assistant",description:this.strings.manageLinkAssistant,name:this.strings.linkAssistant,manageUrl:this.$aioseo.urls.aio.linkAssistant,access:"aioseo_link_assistant_settings"},{icon:"svg-redirect",description:this.strings.manageRedirects,name:this.strings.redirects,manageUrl:this.$aioseo.urls.aio.redirects,access:"aioseo_redirects_settings"}].filter(s=>this.$allowed(s.access))}}),methods:r(o({},f(["dismissNotifications"])),{processDismissAllNotifications(){const s=[];this.notifications.forEach(e=>{s.push(e.slug)}),this.dismissNotifications(s)}})},h={};var Es=n(Ns,As,Ls,!1,Ms,null,null,null);function Ms(s){for(let e in h)this[e]=h[e]}var $t=function(){return Es.exports}();export{$t as default};
