from re import findall

numbers_map = dict(one=1, two=2, three=3, four=4, five=5, six=6, seven=7, eight=8, nine=9)


def match_or_map(value):
    try:
        return int(value)
    except ValueError:
        return numbers_map[value]


total = 0
f = open('input.txt', 'r')
for line in f:
    line_matches = findall(r'(?=(\d|one|two|three|four|five|six|seven|eight|nine))', line)
    first_match = match_or_map(line_matches[0])
    last_match = match_or_map(line_matches[-1])

    total += int(str(first_match) + str(last_match))
f.close()
print(total)
