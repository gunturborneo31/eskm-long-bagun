@for ($yearOption = 2023; $yearOption <= (int) date('Y'); $yearOption++)
    <option value="{{ $yearOption }}" {{ (int) $selectedYear === $yearOption ? 'selected' : '' }}>{{ $yearOption }}</option>
@endfor
