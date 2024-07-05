# vue3-template

## Project setup

```
npm install
```

### Compiles and hot-reloads for development

```
npm run serve
```

### Compiles and minifies for production

```
npm run build
```

### Lints and fixes files

```
npm run lint
```

### Customize configuration

See [Configuration Reference](https://cli.vuejs.org/config/).

<h4>Structure project</h4>
<strong>Assets</strong> — The assets folder holds your asset files like CSS files, fonts and images.
<strong>Components</strong> — The components folder holds all reusable components of the application N.B. the components folder will not hold views but rather only reusable components. We are going to divide the Components folder into 2 or more depending on what exactly you will need
<strong>Helpers</strong> — As the name suggests, the helpers will hold helper functions that you would like to use in your application. An example of these files is one that I have here called the errorhandler. These contain functions used to handle errors in the application. You can also use the helpers folder to hold other things like dummy data and so on.
<strong>Layouts</strong> — The layouts folder is used to hold the layouts of your application. An example of a layout is AuthLayout.vue.
<strong>Locales</strong> — This is the folder that I rarely use. I got the concept from another project which had to configure many languages for the application. All language configurations go here
<strong>Router</strong> — This folder contains all router configurations and routes
<strong>Views</strong> — The views folder only holds your vue files like your login.vue etc.
<strong>Store</strong> — The state folder can also be called the store folder. It holds State management library configuration like Vuex and its state modules
