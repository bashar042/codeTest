<?php

Class TransactionCommission
{
    public function getTransactionCommission($inputs)
    {
        $outputs = [];
        if (!empty($inputs)) {
            foreach (explode("\n", $inputs) as $row) {
                $line = json_decode($row, true);
                if (!empty($line)) {
                    try {
                        $binResults = file_get_contents('https://lookup.binlist.net/' . $line['bin']);
                        if (!empty($binResults)) {
                            $r = json_decode($binResults);
                            $isEu = isEu($r->country->alpha2);

                            $amntFixed = convertCurrency($line['amount'], $line['currency']);

                            $result = $amntFixed * ($isEu === true ? 0.01 : 0.02);
                            $result = round($result, 2, PHP_ROUND_HALF_UP);
                            $outputs[] = $result;
                        }

                    } catch (Exception $e) {
                        //echo $e->getMessage();
                    }

                }
            }
        }

        return $outputs;
    }
}