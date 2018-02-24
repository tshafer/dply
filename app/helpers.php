<?php

function checkHost()
{
    if (request()->getHttpHost() == 'dply.io') {
        return request()->getHttpHost();
    }
}
