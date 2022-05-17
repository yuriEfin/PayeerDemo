<?php

namespace Payeer\Api\Response;

/**
 * @todo:
 *      Параметры ответа:
 * Параметр    Описание    Пример
 * success    признак успешности запроса    true, false
 * balances    список валют пользователя
 * total    общий баланс    1598.99
 * available    доступный баланс    1548.99
 * hold    заблокированные д/с    50
 */
class AccountDto extends AbstractResponseDto
{
    public function __construct(array $data)
    {
        // .. foreach by data and set properties OR without _construct - use new this class and set properties
    }
}
