import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/css/parentdashboard.css', 'resources/css/childprofile.css', 'resources/css/attendance.css', 'resources/css/help.css', 'resources/css/caregiver/dashboard.css',
                'resources/css/caregiver/events.css',
                'resources/css/caregiver/notifications.css', 'resources/js/app.js'],
            refresh: true,
        }),
        tailwindcss(),
    ],
    server: {
        watch: {
            ignored: ['**/storage/framework/views/**'],
        },
    },
});
