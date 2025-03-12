// eslint.config.js
import {
    defineConfig,
} from 'eslint/config';
import vuePlugin from 'eslint-plugin-vue';
import vueParser from 'vue-eslint-parser';

export default defineConfig([{
    languageOptions: {
        parser: vueParser, // Use vue-eslint-parser for .vue files
        parserOptions: {
            ecmaVersion: 'latest', // Use the latest ECMAScript version
            sourceType: 'module', // Use ES modules
        },
    },
    plugins: {
        vue: vuePlugin, // Use vue plugin
    },
    settings: {
        vue: {
            version: 'detect', // Automatically detect the version of Vue
        },
    },
    rules: {
        // Best Practices
        'no-unused-vars': 'warn', // Warn about unused variables
        'no-console': 'warn', // Warn about console statements
        'no-debugger': 'error', // Disallow debugger statements
        'no-alert': 'error', // Disallow alert, confirm, and prompt
        'no-eval': 'error', // Disallow eval()
        'no-implied-eval': 'error', // Disallow implied eval() (e.g., setTimeout with string)
        'no-unreachable': 'error', // Disallow unreachable code
        'no-else-return': 'warn', // Disallow else after return
        'no-multi-spaces': 'warn', // Disallow multiple spaces
        'no-useless-return': 'warn', // Disallow unnecessary return statements

        // Code Style
        'semi': 'error', // Require semicolons
        'quotes': ['error', 'single'], // Enforce single quotes
        // 'indent': ['error', 2], // Enforce 2-space indentation
        'comma-dangle': ['error', 'always-multiline'], // Require trailing commas in multiline objects/arrays
        'object-curly-spacing': ['error', 'always'], // Enforce spaces inside curly braces
        'array-bracket-spacing': ['error', 'never'], // Disallow spaces inside array brackets
        'arrow-spacing': 'error', // Enforce spacing around arrow functions
        'prefer-const': 'error', // Prefer const over let for variables that aren't reassigned
        'prefer-template': 'error', // Prefer template literals over string concatenation

        // ES6+ Features
        'arrow-parens': ['error', 'always'], // Require parentheses around arrow function parameters
        'no-var': 'error', // Disallow var, use let or const instead
        'prefer-arrow-callback': 'error', // Prefer arrow functions for callbacks
        'template-curly-spacing': 'error', // Enforce spacing inside template literals

        // Vue-Specific Rules (if using Vue)
        'vue/multi-word-component-names': 'off', // Disable multi-word component names rule
        'vue/no-unused-components': 'warn', // Warn about unused Vue components
        'vue/no-mutating-props': 'error', // Disallow mutating props directly
    },
}]);
