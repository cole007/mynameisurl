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
    
    private $pageUrl;
    private $redir = false;
    public function init()
    {
        $this->pageUrl = craft()->request->getUrl();

        parent::init();
        craft()->on('plugins.onLoadPlugins', function(Event $event) {

            $this->pageUrl = craft()->request->getUrl();

            $filter = 'index.php?p=';
            $indexPos = strpos($this->pageUrl,$filter);
            $pageUrlLower = strtolower($this->pageUrl);
            
            $settings = $this->getSettings();
            $redirects = $settings['redirects'];
            
            $tmp = array_filter($redirects, function($v) {
                // check for wildcards here (*)?
                if (strrpos($v['src'],'*') !== false) {
                    $tmp = str_replace('*','',$v['src']);
                    if (strpos($this->pageUrl,$tmp) === 0) $this->redir = $v['dest'];    
                }
                if ($v['src'] == $this->pageUrl) $this->redir = $v['dest'];                
            });
            
            // if index.php in URL then …
            if ($indexPos !== false) {
                $this->redir = substr($this->pageUrl,(strlen($filter)+$indexPos));                
            // if pageUrl contains uppercase characters then …
            } elseif ($this->pageUrl !== $pageUrlLower) {
                $this->redir = $pageUrlLower;
            }

            if ($this->redir) craft()->request->redirect($this->redir,true,301);
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
        return '1.0.1';
    }

    /**
     * @return string
     */
    public function getSchemaVersion()
    {
        return '1.0.1';
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
        return array(
            'redirects' => array(AttributeType::String, 'label' => 'Redirects', 'default' => ''),
        );
    }

    /**
     * @return mixed
     */
    public function getSettingsHtml()
    {
       return craft()->templates->render('mynameisurl/MyNameIsUrl_Settings', array(
           'settings' => $this->getSettings()
       ));
    }

    /**
     * @param mixed $settings  The plugin's settings
     *
     * @return mixed
     */
    public function prepSettings($settings)
    {
        // Modify $settings here...
        $redir = $settings['redirects'];
        foreach ($redir AS $key => $row) {
            $int = substr($row['src'],0,1);
            if ($int !== '/') $redir[$key]['src'] = '/' . $row['src'];
            if ($row['src'] == '' || $row['dest'] == '') unset($redir[$key]);
        }
        $settings['redirects'] = $redir;
        return $settings;
    }

}