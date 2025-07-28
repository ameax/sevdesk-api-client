<?php

declare(strict_types=1);

namespace Ameax\SevDeskApi\Enums;

/**
 * Object name values used in the SevDesk API for various entities
 */
class ObjectName
{
    /** Invoice object */
    public const INVOICE = 'Invoice';
    
    /** Voucher object */
    public const VOUCHER = 'Voucher';
    
    /** Order object */
    public const ORDER = 'Order';
    
    /** Credit note object */
    public const CREDIT_NOTE = 'CreditNote';
    
    /** Contact object */
    public const CONTACT = 'Contact';
    
    /** Part object */
    public const PART = 'Part';
    
    /** Unity object */
    public const UNITY = 'Unity';
    
    /** Tax rule object */
    public const TAX_RULE = 'TaxRule';
    
    /** Accounting type object */
    public const ACCOUNTING_TYPE = 'AccountingType';
    
    /** Check account object */
    public const CHECK_ACCOUNT = 'CheckAccount';
    
    /** Check account transaction object */
    public const CHECK_ACCOUNT_TRANSACTION = 'CheckAccountTransaction';
    
    /** Document folder object */
    public const DOCUMENT_FOLDER = 'DocumentFolder';
    
    /** Tag object */
    public const TAG = 'Tag';
}