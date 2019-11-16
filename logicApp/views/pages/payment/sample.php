<div class="col-xs-48 col-xs-offset-1">
<br /><br />
<form action="<?=site_url('payment/paymentRequest');?>" method="post">
<input type="hidden" name="Title" value="PHP VPC 3-Party">

    <!-- get user input -->
    <table width="80%" align="center" border="0" cellpadding='0' cellspacing='0'>


    <tr bgcolor="#E1E1E1">
        <td width="1%">&nbsp;</td>
        <td width="40%" align="right"><b><i>Virtual Payment Client URL:&nbsp;</i></b></td>
        <td width="59%"><input type="text" name="virtualPaymentClientURL" size="63" value="https://migs.mastercard.com.au/vpcpay" maxlength="250"></td>
    </tr>
    <tr>
        <td colspan="3">&nbsp;<hr width="75%">&nbsp;</td>
    </tr>
    <tr bgcolor="#C1C1C1">
        <td colspan="3" height="25"><p><b>&nbsp;Basic 3-Party Transaction Fields</b></p></td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td align="right"><b><i> VPC Version: </i></b></td>
        <td><input type="text" name="vpc_Version" value="1" size="20" maxlength="8"></td>
    </tr>
    <tr bgcolor="#E1E1E1">
        <td>&nbsp;</td>
        <td align="right"><b><i>Command Type: </i></b></td>
        <td><input type="text" name="vpc_Command" value="pay" size="20" maxlength="16"></td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td align="right"><b><i>Merchant AccessCode: </i></b></td>
        <td><input type="text" name="vpc_AccessCode" value="4FF45C34" size="20" maxlength="8"></td>
    </tr>
    <tr bgcolor="#E1E1E1">
        <td>&nbsp;</td>
        <td align="right"><b><i>Merchant Transaction Reference: </i></b></td>
        <td><input type="text" name="vpc_MerchTxnRef" value="SampleData" size="20" maxlength="40"></td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td align="right"><b><i>MerchantID: </i></b></td>
        <td><input type="text" name="vpc_Merchant" value="TESTKERALAONROAD" size="20" maxlength="16"></td>
    </tr>
    <tr bgcolor="#E1E1E1">
        <td>&nbsp;</td>
        <td align="right"><b><i>Transaction OrderInfo: </i></b></td>
        <td><input type="text" name="vpc_OrderInfo" value="VPC Example" size="20" maxlength="34"></td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td align="right"><b><i>Purchase Amount: </i></b></td>
        <td><input type="text" name="vpc_Amount" value="100" size="20" maxlength="10"></td>
    </tr>
    <tr bgcolor="#E1E1E1">
        <td>&nbsp;</td>
        <td align="right"><b><i>Payment Server Display Language Locale: </i></b></td>
        <td><input type="text" name="vpc_Locale" value="en" size="20" maxlength="5"></td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td align="right"><b><i>Receipt ReturnURL: </i></b></td>
        <td><input type="text" name="vpc_ReturnURL" size="63" value="http://keralaonroad.com/payment/Replay" maxlength="250"></td>
    </tr>
    <tr>    <td colspan="3">&nbsp;</td></tr>

    <tr>    <td colspan="2">&nbsp;</td> 
            <td><input type="submit" name="SubButL" value="Pay Now!"></td></tr>

    <tr><td colspan="3">&nbsp;<hr width="75%">&nbsp;</td></tr>
    <tr bgcolor="#C1C1C1">
        <td colspan="3" height="25"><p><b>&nbsp;Optional Ticket Number Field</b></p></td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td align="right"><b><i>TicketNo: </i></b></td>
        <td><input type="text" name="vpc_TicketNo" maxlength="15"></td>
    </tr>

    <tr><td colspan="3">&nbsp;<hr width="75%">&nbsp;</td></tr>
    <tr bgcolor="#C1C1C1">
        <td colspan="3" height="25"><p><b>&nbsp;Optional Transaction Source Subtype Field</b></p></td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td align="right"><b><i>Transaction Source Subtype: </i></b></td>
        <td><select name="vpc_TxSourceSubType">
                <option value="">Please Select</option>
                <option value="SINGLE">Indicates a single payment to complete order</option>
                <option value="INSTALLMENT">Indicates an installment transaction</option>
                <option value="RECURRING">Indicates a recurring transaction</option>
            </select>
        </td>
    </tr>
    <tr><td colspan="3">&nbsp;<hr width="75%">&nbsp;</td></tr>

    </table><br/>
  </form>
  </div>