<?php

// keep unauthorized users out
$this->require_admin ();

require_once ('apps/admin/lib/Functions.php');

// set the layout and page title
$page->layout = 'admin';
$page->title = __ ('FAQ Settings');

// create the form
$form = new Form ('post', $this);

// set the form data from the app settings
$form->data = array (
    'title' => Appconf::faq ('FAQ', 'title'),
    'layout' => Appconf::faq ('FAQ', 'layout'),
    'layouts' => admin_get_layouts ()
);

echo $form->handle (function ($form) {
    // merge the new values into the settings
    $merged = Appconf::merge ('faq', array (
        'FAQ' => array (
            'title' => $_POST['title'],
            'layout' => $_POST['layout']
        )
    ));

    // save the settings to disk
    if (! Ini::write ($merged, 'conf/app.faq.' . ELEFANT_ENV . '.php')) {
        printf (
            '<p>%s</p>',
            __ ('Unable to save changes. Check your permissions and try again.')
        );
        return;
    }

    // redirect to the main admin page with a notification
    $form->controller->add_notification (__ ('Settings saved.'));
    $form->controller->redirect ('/faq/admin');
});

?>