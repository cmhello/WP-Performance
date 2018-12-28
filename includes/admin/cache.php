<?php namespace WPP;

defined('ABSPATH') or exit; ?>

<div class="wpp-page-wrapper">

    <div class="wpp-content-section">
    
        <table>
            <tr>
                <td colspan="2"><h3><?php _e( 'Cache', 'wpp' ); ?></h3></td>
            </tr>
            <tr>
                <td><strong><?php _e( 'Enable cache', 'wpp' ); ?></strong></td>
                <td>
                    <label class="wpp-info">
                        <input type="checkbox" value="1" data-wpp-checkbox="cache" name="cache" form="wpp-settings" <?php wpp_checked( 'cache' ); ?> />
                        <?php _e( 'Reduces your server response time by serving static files to users', 'wpp' ); ?>
                    </label>

                    <div data-wpp-show-checked="cache">
                        <br />
                        <label class="wpp-info">
                            <input type="checkbox" value="1" name="mobile_cache" form="wpp-settings" <?php wpp_checked( 'mobile_cache' ); ?> />
                            <?php _e( 'Separate cache for mobile devices', 'wpp' ); ?>
                        </label>
                        <br /><br />
                        <em><span class="dashicons dashicons-info"></span> <?php _e( 'Create a dedicated cache file for mobile devices', 'wpp' ); ?></em>
                    </div>

                </td>
            </tr>

            <tr data-wpp-show-checked="cache">
                <td><strong><?php _e( 'Clear cache after', 'wpp' ); ?></strong></td>
                <td>
                    <input type="number" min="1" value="<?php echo Option::get( 'cache_time', 24 ); ?>" name="cache_time" form="wpp-settings"> 
                    <select name="cache_length" form="wpp-settings">
                        <option value="60" <?php wpp_selected( 'cache_length', 60 ); ?>>
                            <?php _e( 'minutes', 'wpp' ); ?>
                        </option>
                        <option value="3600" <?php wpp_selected( 'cache_length', 3600, 3600 ); ?>>
                            <?php _e( 'hours', 'wpp' ); ?>
                        </option>
                        <option value="86400" <?php wpp_selected( 'cache_length', 86400 ); ?>>
                            <?php _e( 'days', 'wpp' ); ?>
                        </option>
                    </select>
                </td>
            </tr>
            
            <tr data-wpp-show-checked="cache">
                <td><strong><?php _e( 'Clear cache when', 'wpp' ); ?></strong></td>
                <td>
                    <label class="wpp-info">
                        <input type="checkbox" value="1" name="update_clear" form="wpp-settings" <?php wpp_checked( 'update_clear' ); ?> />
                        <?php _e( 'A new post or page is published or updated', 'wpp' ); ?>
                    </label>
                    <br /><br />
                    <label class="wpp-info">
                        <input type="checkbox" value="1" name="delete_clear" form="wpp-settings" <?php wpp_checked( 'delete_clear' ); ?> />
                        <?php _e( 'A post or page is deleted', 'wpp' ); ?>
                    </label>
                    <br /><br />
                    <label class="wpp-info">
                        <input type="checkbox" value="1" name="save_clear" form="wpp-settings" <?php wpp_checked( 'save_clear' ); ?> />
                        <?php echo WPP_PLUGIN_NAME; ?> <?php _e( 'settings are saved', 'wpp' ); ?>
                    </label>
                </td>
            </tr>

            <tr data-wpp-show-checked="cache">
                <td><strong><?php _e( 'Varnish', 'wpp' ); ?></strong></td>
                <td>
                    <label class="wpp-info">
                        <input type="checkbox"  data-wpp-checkbox="varnish_auto_purge" value="1" name="varnish_auto_purge" form="wpp-settings" <?php wpp_checked( 'varnish_auto_purge' ); ?> />
                        <?php _e( 'Enable auto purge', 'wpp' ); ?>
                    </label>
                    <br /> <br />
                    <em><span class="dashicons dashicons-info"></span> <?php _e( 'If Varnish runs on your server, you need to activate this option', 'wpp' ); ?></em>
                </td>
            </tr>

            <tr data-wpp-show-checked="varnish_auto_purge">
                <td><strong><?php _e( 'Custom host', 'wpp' ); ?></strong></td>
                <td>
                    <input 
                        type="text" 
                        placeholder="http://"
                        name="varnish_custom_host" 
                        value="<?php echo Option::get( 'varnish_custom_host' ); ?>" 
                        form="wpp-settings"
                        class="wpp-dynamic-input" />  
                            
                        <br /><br />

                    <em><span class="dashicons dashicons-info"></span> <?php _e( 'If you are using proxy, you may need this option', 'wpp' ); ?></em>

                </td>
            </tr>

            <tr data-wpp-show-checked="cache">
                <td><strong><?php _e( 'Cache preloading', 'wpp' ); ?></strong></td>
                <td>
                    <div id="wpp-sitemaps-container">

                        <?php $sitemaps = Option::get( 'sitemaps_list', [] ); ?>

                        <?php foreach( $sitemaps as $sitemap ): ?>

                            <div data-dynamic-container="sitemaps_list[]" class="wpp-dynamic-input-container">

                                <input 
                                    name="sitemaps_list[]" 
                                    value="<?php echo $sitemap; ?>" 
                                    placeholder="<?php echo site_url( 'sitemap.xml' ); ?>" 
                                    class="wpp-dynamic-input" 
                                    form="wpp-settings" 
                                    type="text" 
                                    required
                                /> &nbsp; 

                                <a href="#" data-name="sitemaps_list[]" class="button wpp-remove-input"><?php _e( 'Remove', 'wpp' ); ?></a>

                            </div>

                        <?php endforeach; ?>

                    </div>

                    <?php if( ! empty( $sitemaps ) ) : ?>
                        <div data-info-name="sitemaps_list[]">
                            <em><span class="dashicons dashicons-info"></span> <?php _e( 'Enter path to XML sitemap which will be used for cache preloading', 'wpp' ); ?></em>
                            <br />
                        </div>
                    <?php endif; ?>


                    <a href="#" 
                        class="button" 
                        data-add-input="sitemaps_list[]" 
                        data-placeholder="<?php echo site_url( 'sitemap.xml' ); ?>"  
                        data-info="<?php _e( 'Enter path to XML sitemap which will be used for cache preloading', 'wpp' ); ?>"  
                        data-container="#wpp-sitemaps-container">

                        <?php _e( 'Add Sitemap', 'wpp' ); ?>

                    </a>

                </td>
            </tr>

            <tr>
                <td colspan="2"><h3><?php _e( 'Browser caching', 'wpp' ); ?></h3></td>
            </tr>
                 
            <tr>
                <td><strong><?php _e( 'Leverage browser caching', 'wpp' ); ?></strong></td>
                <td>
                    <label class="wpp-info">
                        <input type="checkbox" value="1" name="browser_cache" form="wpp-settings" <?php wpp_checked( 'browser_cache' ); ?> />
                        <?php _e( 'Setting an expiry date in the HTTP headers for static resources instructs the browser to load previously downloaded resources from local disk rather than over the network', 'wpp' ); ?>
                    </label>
                </td>
            </tr>
            
            <tr>
                <td><strong><?php _e('Enable gzip compression', 'wpp'); ?></strong></td>
                <td>
                    <label class="wpp-info">
                        <input type="checkbox" value="1" name="gzip_compression" form="wpp-settings" <?php wpp_checked( 'gzip_compression' ); ?> />
                        <?php _e( 'Compressing resources with gzip reduce the number of bytes sent over the network', 'wpp' ); ?>  
                    </label>
                </td>
            </tr>
            
        </table>
        
        <br />

        <input type="submit" class="button-primary" value="<?php _e( 'Save changes', 'wpp' ); ?>" name="wpp-save-settings" form="wpp-settings" />
        

    </div>

    <div class="wpp-side-section">
        
        <h3>
            <?php _e( 'Cache statistics', 'wpp' ); ?>
            <a href="#" id="wpp-clear-cache" data-description="<?php _e( 'Clear cache', 'wpp' ); ?>" class="button alignright"><?php _e( 'Clear cache', 'wpp' ); ?></a> 
        </h3>

        <hr />

        <?php 

            $html  = wpp_cache_files_size( 'html' ) 
                   + wpp_cache_files_size( 'html_gzip' ) 
                   + wpp_cache_files_size( 'html_mobile_gzip' );

            $css   = wpp_cache_files_size( 'css' );
            $js    = wpp_cache_files_size( 'js' );
            $total = $html + $css + $js;

        ?>
    
        <ul class="wpp-side-section-list" id="wpp-cache-size">
            <li>
                <?php _e( 'HTML files', 'wpp' ); ?> <span><?php echo wpp_filesize( $html ); ?></span>
            </li>
            <li>
                <?php _e( 'CSS files', 'wpp' ); ?> <span><?php echo wpp_filesize( $css ); ?></span>
            </li>
            <li>
                <?php _e( 'JavaScript files', 'wpp' ); ?> <span><?php echo wpp_filesize( $js ); ?></span>
            </li>
            <li>
                
                <strong>
                    <?php _e( 'Total cache size', 'wpp' ); ?>
                    <span><?php echo wpp_filesize( $total ); ?></span>
                </strong>
        
            </li>
        </ul>

        <br />

        <div data-wpp-show-checked="cache">

            <h3><?php _e( 'Exclude URL(s) from cache', 'wpp' ); ?></h3>

            <hr />
    
            <div>

                <?php $excluded_urls = Option::get( 'cache_url_exclude', [] ); ?>

                <div id="wpp-exclude-url-container">

                    <?php foreach( $excluded_urls as $url ): ?>
                        <div data-dynamic-container="cache_url_exclude[]" class="wpp-dynamic-input-container">

                            <input 
                                name="cache_url_exclude[]" 
                                value="<?php echo $url; ?>" 
                                placeholder="<?php echo site_url(); ?>" 
                                class="wpp-dynamic-input" 
                                form="wpp-settings" 
                                type="text" 
                                required
                            /> &nbsp; 

                            <a href="#" data-name="cache_url_exclude[]" class="button wpp-remove-input"><?php _e('Remove', 'wpp'); ?></a>

                        </div>
                    <?php endforeach; ?>

                </div>

                <?php if( ! empty( $excluded_urls ) ) : ?>
                    <div data-info-name="cache_url_exclude[]">
                        <em><span class="dashicons dashicons-info"></span> <?php _e( 'Part of the URL will also work', 'wpp' ); ?></em>
                        <em><span class="dashicons dashicons-info"></span> <?php _e( 'Use {numbers} to match only numbers', 'wpp' ); ?></em>
                        <em><span class="dashicons dashicons-info"></span> <?php _e( 'Use {letters} to match only letters', 'wpp' ); ?></em>
                        <em><span class="dashicons dashicons-info"></span> <?php _e( 'Use {any} to match any string', 'wpp' ); ?></em>
                        <br />
                    </div>
                <?php endif; ?>

                <br />

                <a href="#" 
                    class="button" 
                    data-add-input="cache_url_exclude[]" 
                    data-placeholder="<?php echo site_url(); ?>" 
                    data-info="<?php _e( 'Part of the URL will also work', 'wpp' ); ?>|<?php _e( 'Use {numbers} to match only numbers', 'wpp' ); ?>|<?php _e( 'Use {letters} to match only letters', 'wpp' ); ?>|<?php _e( 'Use {any} to match any string', 'wpp' ); ?>" 
                    data-container="#wpp-exclude-url-container">
                    
                    <?php _e( 'Add URL', 'wpp' ); ?>

                </a>

            </div>

        </div>  
        
        
    </div>

</div>