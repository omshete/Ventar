<?php

if (!function_exists('getServiceIcon')) {
    function getServiceIcon($title) {
        $title = strtolower(trim($title));
        
        // Web Development Services
        if (str_contains($title, 'web') || str_contains($title, 'website')) {
            return 'web';
        }
        if (str_contains($title, 'frontend') || str_contains($title, 'react')) {
            return 'code';
        }
        if (str_contains($title, 'backend') || str_contains($title, 'laravel')) {
            return 'developer_mode';
        }
        
        // Design Services
        if (str_contains($title, 'design') || str_contains($title, 'ui') || str_contains($title, 'ux')) {
            return 'design_services';
        }
        if (str_contains($title, 'graphic')) {
            return 'palette';
        }
        
        // Mobile Services
        if (str_contains($title, 'mobile') || str_contains($title, 'app')) {
            return 'smartphone';
        }
        if (str_contains($title, 'android') || str_contains($title, 'ios')) {
            return 'phone_android';
        }
        
        // Cloud & DevOps
        if (str_contains($title, 'cloud') || str_contains($title, 'aws')) {
            return 'cloud';
        }
        if (str_contains($title, 'devops') || str_contains($title, 'ci/cd')) {
            return 'build';
        }
        
        // Support & Maintenance
        if (str_contains($title, 'support') || str_contains($title, 'maintenance')) {
            return 'support_agent';
        }
        if (str_contains($title, 'hosting')) {
            return 'storage';
        }
        
        // Digital Marketing
        if (str_contains($title, 'seo') || str_contains($title, 'marketing')) {
            return 'campaign';
        }
        if (str_contains($title, 'social')) {
            return 'share';
        }
        
        // E-commerce
        if (str_contains($title, 'ecommerce') || str_contains($title, 'shop')) {
            return 'store';
        }
        
        // AI/ML
        if (str_contains($title, 'ai') || str_contains($title, 'artificial')) {
            return 'smart_toy';
        }
        
        // Default fallback
        return 'build';
    }
}
