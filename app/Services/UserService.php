<?php

namespace App\Services;

use Exception;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Vehicle;
use App\Models\UserVehicle;

class UserService
{
    public function extensionReservationService(Vehicle $vehicle, User $user, array $requestParameters): void
    {
        if ($this->vehicleIsLocked($vehicle)) {
            throw new CannotReservedVehicleLockedException();
        }

        $price = $this->getPrice($requestParameters, $vehicle);

        if ($this->userHasNoEnoughMoney($user, $price)) {
            throw new UserHasNotEnoughMoneyException();
        }

        $user->update([
           'wallet' => $user->wallet - $price,
        ]);

        UserVehicle::update([
            'ended_at' => $requestParameters['new_ending_at'],
        ]);
    }

    //faire la soustraction de la nouvelle date de fin avec l'ancienne pour déterminé l'argent supplémentaire à rajouter
    private function getPrice(array $requestParameters, Vehicle $vehicle): float
    {
        $userVec = UserVehicle::where('vehicle_id', $vehicle->id);
        dd($userVec);
        $oldDate = $userVec->ended_at;

        $days = $oldDate->diffInDays($requestParameters['new_ending_at']);

        return ($days + 1) * $vehicle->price;
    }

    private function userHasNoEnoughMoney(User $user, float $price): bool
    {
        return $user->wallet < $price;
    }

    private function vehicleIsLocked(Vehicle $vehicle): bool
    {
        return $vehicle->status === VehiculeConstantes::STATUES['LOCKED'];
    }
}
