<?php

class RandomUserProvider extends Provider
{
    protected string $url = "https://randomuser.me/api/";

    public function generate(int $count = 1): array
    {
        curl_setopt_array($this->ch, [
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_HEADER => 0,
            CURLOPT_URL => $this->url . '?results=' . $count
        ]);

        $response = json_decode(curl_exec($this->ch), true);

        if (curl_error($this->ch)) {
            writeLog("Сервис вернул ошибку", true);
        }

        return $response['results'];
    }
}
