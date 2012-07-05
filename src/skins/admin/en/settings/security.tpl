{* vim: set ts=2 sw=2 sts=2 et: *}

{**
 * Environment footer
 *
 * @author    Creative Development LLC <info@cdev.ru>
 * @copyright Copyright (c) 2011 Creative Development LLC <info@cdev.ru>. All rights reserved
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      http://www.litecommerce.com/
 * @since     1.0.13
 *
 * @ListChild (list="crud.settings.footer", zone="admin", weight="100")
 *}
{if:page=#Security#}

  <h2>{t(#Safe mode#)}</h2>

  <table cellspacing="1" cellpadding="5" class="settings-table">
    <tr>
      <td>{t(#Safe mode access key#)}:</td>
      <td><strong>{getSafeModeKey()}</strong></td>
    </tr>
    <tr>
      <td>{t(#Hard reset URL (disables all modules and runs application)#)}:</td>
      <td>{getHardResetURL()}</td>
    </tr>
    <tr>
      <td>{t(#Soft reset URL (disables only unsafe modules and runs application)#)}:</td>
      <td>{getSoftResetURL()}</td>
    </tr>
  </table>

  <widget class="\XLite\View\Button\Regular" label="Re-generate access key" jsCode="self.location='{buildURL(#settings#,#safe_mode_key_regen#)}'" />

  <p>{t(#New access key will also be sent to the Site administrator's email address#)}</p>

  <h2>{t(#HTTPS check#)}</h2>

<script type="text/javascript">
<!--
/* uncheck & disable checkboxes */
var customer_security_value = jQuery('input[name="customer_security"][type="checkbox"]').attr('checked');
var full_customer_security_value = jQuery('input[name="full_customer_security"][type="checkbox"]').attr('checked');
var admin_security_value = jQuery('input[name="admin_security"][type="checkbox"]').attr('checked');
var httpsEnabled = false;

function https_checkbox_click()
{
    if (!httpsEnabled) {
      jQuery('input[name="customer_security"][type="checkbox"]').attr('checked', '');
      jQuery('input[name="admin_security"][type="checkbox"]').attr('checked', '');
      jQuery('input[name="full_customer_security"][type="checkbox"]').attr('disabled', 'disabled');

      document.getElementById("httpserror-message").style.cssText = "";

      alert("No HTTPS is available. See the red message below.");
    }

    if (jQuery('input[name="customer_security"][type="checkbox"]').attr('checked') == false) {
      jQuery('input[name="full_customer_security"][type="checkbox"]').attr({'checked' : '', 'disabled' : 'disabled'});
    } else {
      jQuery('input[name="full_customer_security"][type="checkbox"]').attr('disabled', '');
    }
}

function enableHTTPS()
{
    httpsEnabled = true;
    jQuery('input[name="customer_security"][type="checkbox"]').attr('checked', customer_security_value);

    if (customer_security_value)
      jQuery('input[name="full_customer_security"][type="checkbox"]').attr('disabled', '');
    else
      jQuery('input[name="full_customer_security"][type="checkbox"]').attr('disabled', 'disabled');

    jQuery('input[name="full_customer_security"][type="checkbox"]').attr('checked', full_customer_security_value);
    jQuery('input[name="admin_security"][type="checkbox"]').attr('checked', admin_security_value);

    document.getElementById("httpserror-message").style.cssText = "";
    document.getElementById("httpserror-message").innerHTML = "<span class='success-message'>" + xliteConfig.success_lng + "</span>";
}

jQuery('input[name="customer_security"][type="checkbox"]').attr('checked', '');
jQuery('input[name="full_customer_security"][type="checkbox"]').attr({'checked': '', 'disabled': 'disabled'});
jQuery('input[name="admin_security"][type="checkbox"]').attr('checked', '');

jQuery(
'input[name="customer_security"][type="checkbox"],input[name="full_customer_security"][type="checkbox"], input[name="admin_security"][type="checkbox"]'
).click(https_checkbox_click);
-->
</script>

  {* Check if https is available *}
  {t(#Trying to access the shop at X#,_ARRAY_(#url#^getShopURL(#cart.php#,#1#))):h}
  <span id="httpserror-message" style="visibility:hidden">
    <p class="error-message"><strong>{t(#Failed#)}:</strong> {t(#Secure connection cannot be established.#)}</p>
    {t(#To fix this problem, do the following: 3 points#):h}
  </span>

<script type="text/javascript" src="{getShopURL(#https_check.php#,#1#)}"></script>
<script type="text/javascript">
<!--
if (!httpsEnabled) {
    document.getElementById('httpserror-message').style.cssText = '';
}
-->
</script>

{end:}
