{{-- resources/views/emails/email-template.blade.php --}}

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        @if (!empty($greeting))
            {{ $greeting }}
        @else
            @if ($level === 'error')
                @lang('Whoops!')
            @else
                @lang('Hello!')
            @endif
        @endif
    </title>
</head>

<body>
    <table style="width: 100%; max-width: 600px; margin: 0 auto; padding: 20px; border-collapse: collapse;">
        <!-- Header -->
        <tr>
            <td style="text-align: center; background-color: #047f43; padding: 20px;">
                <h1 style="color: #ffffff; margin: 0;">KP Education Foundation</h1>
            </td>
        </tr>
        <!-- Content -->
        <tr>
            <td>
                {{-- <p>{{ $content }}</p> --}}
            </td>
        </tr>
        <!-- Action Button -->

        <!-- Outro Lines -->
        <tr>
            <td>
                @foreach ($outroLines as $line)
                    <p>{{ $line }}</p>
                @endforeach
            </td>
        </tr>
        <!-- Subcopy -->
        <tr>
            <td>
                @isset($actionText)
                    <p>
                        @lang("If you're having trouble clicking the \":actionText\" button, copy and paste the URL below into your web browser:", ['actionText' => $actionText])
                        <br>
                        <span style="word-break: break-all;">{{ $actionUrl }}</span>
                    </p>
                @endisset
            </td>
        </tr>
        <tr>
            <td style="text-align: center;">
                @isset($actionText)
                    <?php
                    $color = match ($level) {
                        'success', 'error' => $level,
                        default => 'primary',
                    };
                    ?>
                    <button onclick="window.location='{{ $actionUrl }}'"
                        style="background-color: #047f43; color: #fff; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;">
                        {{ $actionText }}
                    </button>
                @endisset
            </td>
        </tr>
        <!-- Footer -->
        <tr>
            <td style="text-align: center; padding-top: 20px;">
                <p style="margin: 0;">Regards,</p>
                <p style="margin: 0;">{{ config('app.name') }}</p>
            </td>
        </tr>
    </table>
</body>

</html>
