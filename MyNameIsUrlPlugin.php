<?php
/**
 * My Name is Url plugin for Craft CMS
 *
 * Funky redirect gubbins for client
 *
 * @author    @cole007
 * @copyright Copyright (c) 2018 @cole007
 * @link      http://ournameismud.co.uk/
 * @package   MyNameIsUrl
 * @since     1.0.0
 */

namespace Craft;

class MyNameIsUrlPlugin extends BasePlugin
{
    /**
     * @return mixed
     */
    public function init()
    {
        parent::init();
        craft()->on('plugins.onLoadPlugins', function(Event $event) {

            $redir = false;

            $pageUrl = craft()->request->getUrl();
            $filter = 'index.php?p=';
            $indexPos = strpos($pageUrl,$filter);
            $pageUrlLower = strtolower($pageUrl);
            // if index.php in URL then …
            if ($indexPos !== false) {
                $redir = substr($pageUrl,(strlen($filter)+$indexPos));                
            // if pageUrl contains uppercase characters then …
            } elseif ($pageUrl !== $pageUrlLower) {
                $redir = $pageUrlLower;
            }

            if ($redir) craft()->request->redirect($redir,true,301);
        });
    }

    /**
     * @return mixed
     */
    public function getName()
    {
         return Craft::t('My Name is Url');
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return Craft::t('Funky redirect gubbins for client');
    }

    /**
     * @return string
     */
    public function getDocumentationUrl()
    {
        return '???';
    }

    /**
     * @return string
     */
    public function getReleaseFeedUrl()
    {
        return '???';
    }

    /**
     * @return string
     */
    public function getVersion()
    {
        return '1.0.0';
    }

    /**
     * @return string
     */
    public function getSchemaVersion()
    {
        return '1.0.0';
    }

    /**
     * @return string
     */
    public function getDeveloper()
    {
        return '@cole007';
    }

    /**
     * @return string
     */
    public function getDeveloperUrl()
    {
        return 'http://ournameismud.co.uk/';
    }

    /**
     * @return bool
     */
    public function hasCpSection()
    {
        return false;
    }

    /**
     */
    public function onBeforeInstall()
    {
    }

    /**
     */
    public function onAfterInstall()
    {
    }

    /**
     */
    public function onBeforeUninstall()
    {
    }

    /**
     */
    public function onAfterUninstall()
    {
    }

    /**
     * @return array
     */
    protected function defineSettings()
    {
        return false;
        // return array(
        //     'someSetting' => array(AttributeType::String, 'label' => 'Some Setting', 'default' => ''),
        // );
    }

    /**
     * @return mixed
     */
    public function getSettingsHtml()
    {
       return false;
       
       // return craft()->templates->render('mynameisurl/MyNameIsUrl_Settings', array(
       //     'settings' => $this->getSettings()
       // ));
    }

    /**
     * @param mixed $settings  The plugin's settings
     *
     * @return mixed
     */
    public function prepSettings($settings)
    {
        // Modify $settings here...

        return $settings;
    }

}