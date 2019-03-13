<?php

namespace Pnoexz;

class Diem
{
    /**
     * @param mixed $input
     * @return \DateTimeImmutable
     * @throws \InvalidArgumentException
     */
    public static function createImmutableFromMixed(
        $input
    ): \DateTimeImmutable {
        try {
            if ($input instanceof \DateTimeImmutable) {
                $date = $input;
            } elseif ($input instanceof \DateTime) {
                $date = \DateTimeImmutable::createFromMutable($input);
            } elseif (is_numeric($input)) {
                $date = new \DateTimeImmutable("@$input");
            } else {
                $date = new \DateTimeImmutable($input);
            }
        } catch (\Throwable $e) {
            throw new DiemException(
                'Invalid argument supplied to ' . __METHOD__,
                0,
                $e
            );
        }

        return $date;
    }

    /**
     * @param mixed $input
     * @return \DateTimeImmutable|null
     * @throws \InvalidArgumentException
     */
    public static function createNullableImmutableFromMixed(
        $input = null
    ): ?\DateTimeImmutable {
        if (empty($input)) {
            return null;
        }

        return self::createImmutableFromMixed($input);
    }

    /**
     * @param \DateTimeInterface|null $date
     * @param string                  $format
     * @return string|null
     */
    public static function formatNullable(
        ?\DateTimeInterface $date,
        string $format = DATE_ATOM
    ): ?string {
        if (empty($date)) {
            return null;
        }

        return $date->format($format);
    }
}
