{* vim: set ts=2 sw=2 sts=2 et: *}

{**
 * Country selector
 *
 * @author    Creative Development LLC <info@cdev.ru>
 * @copyright Copyright (c) 2011 Creative Development LLC <info@cdev.ru>. All rights reserved
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      http://www.litecommerce.com/
 * @since     1.0.0
 *}
<select name="{field}"{if:onchange} onchange="{onchange}"{end:}{if:fieldId} id="{fieldId}"{end:} class="{getParam(#className#)} field-country">
  <option value="">{t(#Select one...#)}</option>
  {foreach:getCountries(),v}
  <option IF="{isSelectedCountry(v.code)}" value="{v.code:r}" selected="selected">{v.country}</option>
  <option IF="{!isSelectedCountry(v.code)}" value="{v.code:r}">{v.country}</option>
  {end:}
</select>
