/** @type {import('tailwindcss').Config} */
module.exports = {
    // Définition des chemins des fichiers à scanner par Tailwind CSS
    // Cela permet à Tailwind de purger les classes inutilisées en production.
    content: [
        "./resources/**/*.blade.php", // Inclut tous les fichiers Blade (vues Laravel)
        "./resources/**/*.js", // Inclut tous les fichiers JavaScript
        "./resources/**/*.vue", // Inclut tous les fichiers Vue.js (si utilisés)
    ],
    theme: {
        // Permet d'étendre ou personnaliser le thème par défaut de Tailwind CSS
        extend: {},
    },
    plugins: [
        // Liste des plugins Tailwind CSS (par défaut vide, peut être étendu si nécessaire)
    ],
};
